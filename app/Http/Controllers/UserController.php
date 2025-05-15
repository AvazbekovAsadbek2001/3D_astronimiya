<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Book;
use App\Models\Category_book;
use App\Models\Question;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Test_answer;
use App\Models\Testuser_answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function sections(){
        return view('user.sections');
    }

    public function subjects(){
        $subjects = Subject::all();
        return view('user.listsubjects', compact('subjects'));
    }

    public function tests(){
        $tests = Test::all()->map(function($test){
            $studentId = Auth::guard('student')->user()->id;
            $testAnswer = Test_answer::where('test_id', $test->id)
                ->where('student_id', $studentId)
                ->first();
            return [
                'id' => $test->id,
                'title' => $test->title,
                'count_question' => $test->count_question,
                'time' => $test->time,
                'status' => $testAnswer ? true : false,
                'result' => optional($testAnswer)->count_answer ?? 0,
            ];
        });
        return view('user.listtest', compact('tests'));
    }

    public function object(Request $request){
        $subject = Subject::find($request->id);
        return view('subject', compact('subject'));
    }

    public function subject(Request $request){
        $lessons = Subject::all();
        $lesson = Subject::find($request->id);
        return view('lesson', compact('lessons', 'lesson'));
    }

    public function submit(Request $request){
        $test = Test::find($request->test_id);
        $count_question = $test->count_question;
        $studentId = Auth::guard('student')->id();

        if (Test_answer::where('test_id', $test->id)->where('student_id', $studentId)->count() <= 0) {
            $test_answer = Test_answer::create([
                'test_id' => $test->id,
                'student_id' => $studentId,
                'count_answer' => 0
            ]);

            $correct = 0;

            if (!empty($request->answers)) {
                foreach ($request->answers as $question => $answer) {
                    $answerModel = Answer::find($answer);
                    if ($answerModel && $answerModel->is_correct == 1) {
                        $correct++;
                    }
                    Testuser_answer::create([
                        'test_answer_id' => $test_answer->id,
                        'student_id' => $studentId,
                        'question_id' => $question,
                        'answer_id' => ($answer != 0)?$answer:null,
                    ]);
                }
            }

            $test_answer->update([
                'count_answer' => $correct
            ]);

            //sertifikat beriladimi yomi tekshirish

            return redirect()->route('confirmtest', ['test_id' => $test->id]);
        } else {
            $test_answer = Test_answer::where('test_id', $test->id)
                ->where('student_id', $studentId)
                ->first();

            return redirect()->route('confirmtest', ['test_id' => $test->id]);
        }
    }

    public function perform(Request $request){
        $result = Test_answer::where('test_id', $request->id)
            ->where('student_id', Auth::guard('student')->user()->id)
            ->count();
            if ($result > 0) {
                return redirect()->route('confirmtest',['test_id' => $request->id]);
            } else{
            $count = Test::find($request->id)->count_question;
            $test = Test::find($request->id);
            $tests= Question::where('test_id', $request->id)
                ->inRandomOrder()->limit($count)
                ->get();
            return view('user.perform',compact('tests', 'test'));
        }
    }

    public function confirmtest(Request $request){
        $test = Test::find($request->test_id);
        $testanswer = Test_answer::where('test_id', $test->id)
            ->where('student_id', Auth::guard('student')->user()->id)
            ->first();

        $test_useranswer = Testuser_answer::where('student_id', Auth::guard('student')->user()->id)
            ->where('test_answer_id', $testanswer->id)
            ->get();

        return view('user.confirmtest', compact('test_useranswer','testanswer'));
    }

    public function setting(Request $request){
        $data = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required'
        ]);
        Student::find(Auth::guard('student')->user()->id)->update([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name']
        ]);
        return redirect()->back();
    }

    public function categories(){
        $categories = Category_book::all();
        return view('user.categorybook', compact('categories'));
    }

    public function books(Request $request){
        $books = Book::where('category_book_id', $request->category_id)->get();
        return view('user.books', compact('books'));
    }
}
