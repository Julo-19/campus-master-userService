<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\src\Infrastructure\Persistence\User;
use App\src\Infrastructure\Queue\SendStudentActivatedEmailJob;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'active' => 'Actif',
                        'rejected' => 'Refusé',
                    ])
                    ->required(),
                Forms\Components\Select::make('role')
                    ->options([
                        'student' => 'Étudiant',
                        'teacher' => 'Enseignant',
                        'admin' => 'Admin',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('role')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Inscription')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'active' => 'Actif',
                        'rejected' => 'Refusé',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('activer')
                    ->label('Activer')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->visible(fn (User $record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (User $record) {
                        $record->status = 'active';
                        $record->save();

                        dispatch(new SendStudentActivatedEmailJob($record));

                        \Filament\Notifications\Notification::make()
                            ->title('Compte activé')
                            ->body("Le compte de l'étudiant {$record->name} est maintenant actif.")
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('refuser')
                    ->label('Refuser')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->visible(fn (User $record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (User $record) {
                        $record->status = 'rejected';
                        $record->save();

                        \Filament\Notifications\Notification::make()
                            ->title('Compte refusé')
                            ->body("Le compte de l'étudiant {$record->name} a été refusé.")
                            ->danger()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
