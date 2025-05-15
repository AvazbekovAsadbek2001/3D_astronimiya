<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryBookResource\Pages;
use App\Filament\Resources\CategoryBookResource\RelationManagers;
use App\Models\Category_book;
use App\Models\CategoryBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryBookResource extends Resource
{
    protected static ?string $model = Category_book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCategoryBooks::route('/'),
            'create' => Pages\CreateCategoryBook::route('/create'),
            'view' => Pages\ViewCategoryBook::route('/{record}'),
            'edit' => Pages\EditCategoryBook::route('/{record}/edit'),
        ];
    }
}
