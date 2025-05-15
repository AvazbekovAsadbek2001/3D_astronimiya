<?php

namespace App\Filament\Resources\TestAnswerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionRelationManager extends RelationManager
{
    protected static string $relationship = 'testuserAnswers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Javoblar')
            ->columns([
                Tables\Columns\TextColumn::make('question.question')
                    ->label('Savol'),
                Tables\Columns\TextColumn::make('answer.answer')
                    ->label('Berilgan javob'),
                Tables\Columns\TextColumn::make('question.answers')
                    ->label('Javoblar')
                    ->formatStateUsing(function ($state, $record) {
                        $output = '<ul>'; // HTML ro‘yxat boshlanishi
                        foreach ($record->question->answers as $answer) {
                            if ($answer->id == $record->answer_id && $answer->is_correct) {
                                // Tanlangan va to‘g‘ri javob
                                $output .= "<li style='color: green;'><strong>{$answer->answer}</strong> (Tanlangan va To‘g‘ri)</li>";
                            } elseif ($answer->id == $record->answer_id) {
                                // Faqat tanlangan javob
                                $output .= "<li style='color: blue;'>{$answer->answer} (Tanlangan)</li>";
                            } elseif ($answer->is_correct) {
                                // Faqat to‘g‘ri javob
                                $output .= "<li style='color: green;'>{$answer->answer} (To‘g‘ri)</li>";
                            } else {
                                // Oddiy javob
                                $output .= "<li>{$answer->answer}</li>";
                            }
                        }
                        $output .= '</ul>'; // HTML ro‘yxat yakuni
                        return $output;
                    })->html(),
            ])
            ->filters([
                //
            ])
            ->headerActions([

            ])
            ->actions([

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
