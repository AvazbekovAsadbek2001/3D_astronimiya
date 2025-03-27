<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResource\Pages;
use App\Filament\Resources\TestResource\RelationManagers;
use App\Models\Test;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Test nomi')
                ->columnSpanFull()
                ->required(),
            Forms\Components\TextInput::make('count_question')
                ->label('Beriladigan savollar soni')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('time')
                ->label('Vaqti (minutda) :')
                ->numeric()
                ->required(),    

            Forms\Components\Repeater::make('questions')
                ->label('Savollar')
                ->columnSpanFull()
                ->relationship('questions')
                ->schema([
                    Forms\Components\Textarea::make('question')
                        ->label('Savol matni')
                        ->required(),

                    Forms\Components\Repeater::make('answers')
                        ->label('Javob variantlari')
                        ->relationship('answers')
                        ->schema([
                            Forms\Components\TextInput::make('answer')
                                ->label('Javob varianti')
                                ->required(),
                            Forms\Components\Toggle::make('is_correct')
                                ->label('To‘g‘ri javob?')
                                ->default(false),
                        ])
                        ->defaultItems(4)
                        ->minItems(4) 
                        ->maxItems(6) 
                        ->columns(2), 
                ])
                ->minItems(1) 
                ->columns(1),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Test nomi')
                ->searchable(),
            Tables\Columns\TextColumn::make('count_question')
                ->label('Savollar soni')
                ->numeric(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Yaratilgan sana')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('O‘zgartirilgan sana')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make()->label('Tahrirlash'),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()->label('O‘chirish'),
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }
}
