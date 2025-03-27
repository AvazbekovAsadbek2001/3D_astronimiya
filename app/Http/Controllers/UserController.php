<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sections(){
        return view('user.sections');
    }

    public function subjects(){
        return view('user.listsubjects');
    }

    public function tests(){
        return view('user.listtest');
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
}
