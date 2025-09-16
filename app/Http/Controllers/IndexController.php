<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\SubjectResouce;
use App\Models\Answer;
use App\Models\Category_book;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Test_answer;
use App\Models\Testuser_answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function reja(){
        return view('reja');
    }

    public function api_subjects(){
        $subjects = Subject::all();
        
        return SubjectResouce::collection($subjects);
    }

    public function api_subject(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:subjects,id',
        ]);

        $subject = Subject::find($request->id);
        return new SubjectResouce($subject);
    }

    public function api_categories(){
        $categories = Category_book::all();
        return response()->json($categories);
    }

    public function api_books(Request $request){
        $request->validate([
            'category_id' => 'required|integer|exists:category_books,id',
        ]);

        $books = Category_book::find($request->category_id)->books;
        return BookResource::collection($books);
    }

    public function api_book(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:books,id',
        ]);

        $book = \App\Models\Book::find($request->id);
        return new BookResource($book);
    }

    public function api_tests(){
        $tests = Test::all()->map(function($test){
            $studentId = Auth::guard('api')->user()->id;
            $testAnswer = Test_answer::where('test_id', $test->id)
                ->where('student_id', $studentId)
                ->first();
            return [
                'id' => $test->id,
                'title' => $test->title,
                'count_question' => $test->count_question,
                'time' => $test->time,
                'is_completed' => $testAnswer ? true : false,
                'result' => optional($testAnswer)->count_answer ?? 0,
            ];
        });
        return response()->json($tests);
    }

    public function api_perform(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:tests,id',
        ]);

        $result = Test_answer::where('test_id', $request->id)
            ->where('student_id', Auth::guard('api')->user()->id)
            ->first();
        if ($result) {
            $test = Test::find($request->id);
            return response()->json([
                'test' => $test,
                'count_answer' => $result->count_answer
            ]);
        } else{
            $count = Test::find($request->id)->count_questioncount_answer;
            $test = Test::find($request->id);
            $tests= Question::where('test_id', $request->id)
                ->inRandomOrder()->limit($count)
                ->get();
            return response()->json([
                'test' => $test,
                'questions' => QuestionResource::collection($tests)
            ]);
        }
    }

    public function api_submit(Request $request){
        $test = Test::find($request->test_id);
        $studentId = Auth::guard('api')->id();

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

            return response()->json([
                'message' => 'Test submitted successfully',
                'test' => $test,
                'correct_answers' => $correct
            ]);
        } else {
            return response()->json([
                'message' => 'Test already submitted',
            ], 400);
        }
    }
}
