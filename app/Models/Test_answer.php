<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_answer extends Model
{
    use HasFactory;

    protected $fillable = ['test_id','student_id','count_answer'];

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function testuserAnswers()
    {
        return $this->hasMany(Testuser_answer::class, 'test_answer_id');
    }

    public function answeruser($question_id){
        return Testuser_answer::where('test_answer_id', $this->id)
            ->where('student_id', $this->student_id)
            ->where('question_id', $question_id)
            ->first()
            ->answer;
    }
}
