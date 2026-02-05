<?php

namespace App\Filament\Enseignant\Resources;

use App\Filament\Enseignant\Resources\TeachingResource\Pages;
use App\Filament\Enseignant\Resources\TeachingResource\RelationManagers;
use App\Models\Teaching;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeachingResource extends Resource
{
    protected static ?string $model = Teaching::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
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
}
