<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Test_answer;
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
        $tests = Test::all();
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
            return view('shows.perform',compact('tests', 'test'));
        }
    }
}
