<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testuser_answer extends Model
{
    use HasFactory;

    protected $fillable = ['test_answer_id','student_id','question_id','answer_id'];

    public function testAnswer()
    {
        return $this->belongsTo(Test_answer::class, 'test_answer_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
