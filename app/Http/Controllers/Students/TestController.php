<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Student;

class TestController extends Controller
{
    public function index()
    {
        $id = Student::findorFail(auth()->user()->id)->pluck('classroom_id');
        $data= Quizze::where('classroom_id',$id)->get();
        return view('pages.Students.test.index', compact('data'));
    }
    public function show($id)
    {
        $questions=Question::where('quizze_id',$id)->get();
        $quizz=Quizze::findorfail($id);
        return view('pages.Students.test.question',compact('questions','quizz'));
    }

}
