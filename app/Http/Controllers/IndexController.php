<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        return view('welcome');
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
