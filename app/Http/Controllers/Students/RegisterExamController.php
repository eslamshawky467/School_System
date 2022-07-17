<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class RegisterExamController extends Controller
{
    public function index($id){
        $questions=Question::where('quizze_id',$id)->get();
        $quizz=Quizze::findorfail($id);
        return view('pages.Students.test.RegisterExam',compact('questions','quizz'));

    }


    public function RegisterExam(Request $request,$id)
    {

        $user = Register::where('student_id', '=', $request->input('student_id'))->first();
        $number = Register::where('numberlog', '=', $request->input('numberlog'))->first();
        $match = Quizze::where('numberlog', '=', $request->input('numberlog'))->exists();
        $matches = Quizze::where('numberlog', '=', $request->input('numberlog'))->value('id');

        if ($user === null || $number == null && $match == true ) {
            if($matches==$id){
            $register = new Register();
            $register->student_id = $request->student_id;
            $register->numberlog = $request->numberlog;
            $register->save();
            $questions=Question::where('quizze_id',$id)->get();
            $quizz=Quizze::findorfail($id);
            toastr()->success(trans('messages.success'));
            return view('pages.Students.test.question',compact('questions','quizz'));
        }
        else{
            dd($result="Page Not Found");
        }

        } else {

            dd($results="Page Not Found");

        }
    }

}
