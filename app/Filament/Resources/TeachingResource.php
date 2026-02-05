<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeachingResource\Pages;
use App\Filament\Resources\TeachingResource\RelationManagers;
use App\src\Infrastructure\Persistence\TeachingModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;




class TeachingResource extends Resource
{
    // protected static ?string $model = Teaching::class;
    // protected static ?string $model = \App\src\Infrastructure\Persistence\Teaching::class;
    protected static ?string $model = TeachingModel::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Titre de l’enseignement')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->nullable(),

            // Forms\Components\Select::make('teacher_id')
            //     ->label('Enseignant')
            //     ->relationship('teacher', 'name')
            //     ->searchable()
            //     ->required(),

            Forms\Components\Select::make('teacher_id')
                ->relationship('teacher', 'name', fn ($query) => $query->where('role', 'teacher')->where('status', 'active'))
                ->label('Enseignant')
                ->required(),    

            Forms\Components\Select::make('status')
                ->label('Statut')
                ->options([
                    'active' => 'Actif',
                    'inactive' => 'Inactif',
                ])
                ->default('inactive')
                ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('teacher.name')->label('Enseignant')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Actif',
                        'inactive' => 'Inactif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('toggleStatus')
                    ->label('Activer / Désactiver')
                    ->action(function ($record) {
                        $record->status = $record->status === 'active' ? 'inactive' : 'active';
                        $record->save();

                        \Filament\Notifications\Notification::make()
                            ->title('Statut modifié')
                            ->body("Le statut de {$record->title} est maintenant {$record->status}.")
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ])
                // ->filters([
                //     //
                // ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachings::route('/'),
            'create' => Pages\CreateTeaching::route('/create'),
            'edit' => Pages\EditTeaching::route('/{record}/edit'),
        ];
    }

    

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('teacher_id', auth()->id());
    }

}
