<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestAnswerResource\Pages;
use App\Filament\Resources\TestAnswerResource\RelationManagers;
use App\Filament\Resources\TestAnswerResource\RelationManagers\QuestionRelationManager;
use App\Models\Test_answer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestAnswerResource extends Resource
{
    protected static ?string $model = Test_answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Test javoblari';

    protected static ?string $modelLabel = 'Javob';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('test_id')
                    ->label('Test nomi')
                    ->relationship('test', 'title')
                    ->required(),
                Forms\Components\Select::make('student_id')
                    ->label('Talaba')
                    ->relationship('student', 'name')
                    ->required(),
                Forms\Components\TextInput::make('count_answer')
                    ->label('To‘g‘ri javoblar soni')
                    ->columnSpanFull()
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('test.title')
                ->label('Test nomi'),
            Tables\Columns\TextColumn::make('full_name')
                ->label('To‘liq ism')
                ->getStateUsing(function ($record) {
                    return $record->student->last_name . ' ' .
                           $record->student->first_name . ' ' .
                           $record->student->middle_name;
                }),
            Tables\Columns\TextColumn::make('count_answer')
                ->label('To‘g‘ri javoblar soni'),

            // Tables\Columns\TextColumn::make('testuserAnswers')
            //     ->label('Foydalanuvchi javoblari')
            //     ->html()
            //     ->formatStateUsing(function (Test_answer $record) {
            //         return $record->testuserAnswers->map(function ($answer) {
            //             return "Savol: {$answer->question->question}, Javob: {$answer->answer->answer}";
            //         })->implode('<br>');
            //     }),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Sana'),
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
            QuestionRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestAnswers::route('/'),
            'create' => Pages\CreateTestAnswer::route('/create'),
            'edit' => Pages\EditTestAnswer::route('/{record}/edit'),
        ];
    }
}
