<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     try {
         foreach ($request->option as $key => $value) {
             Answer::create([
                 'quizze_id' => $request->quizze_id[$key],
                 'question_id' => $request->question_id[$key],
                 'student_id' => $request->student_id[$key],
                 'option' => $request->option[$key],
                 //other columns
             ]);
         }
         $ids = Student::findorFail(auth()->user()->id)->section()->get();
         $id = Student::findorFail(auth()->user()->id)->pluck('classroom_id');
         $data['count_sections']= $ids->count();
         $data['count_subjects']= \App\Models\Subject::where('classroom_id',$id)->count();
         toastr()->success(trans('messages.success'));
         return view('pages.Students.dashboard',$data);
     }catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

    }

            //  Answer::create($request->all());
         //   $answer->quizze_id = $List_Answer['quizze_id'];
           // $answer->question_id = $List_Answer['question_id'];
           // $answer->student_id = $List_Answer['student_id'];
           // $answer->option = $List_Answer['option'];





    public function show($id)
    {
                $quizz_id = $id;
                $quizzes=Quizze::where('id', $quizz_id)->pluck("name");
                $questions = Question::where('quizze_id', $quizz_id)->get();
                return view('pages.Students.test.answers', compact('quizz_id', 'questions','quizzes'));
            }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function presult($id)
    {
        $n=Question::where('quizze_id',$id)->pluck('id')->count();
        $q=Quizze::where('id',$id)->pluck('name');
        $ids=Answer::where('tests.quizze_id',$id)->where('tests.student_id',auth()->user()->id)
            ->join('questions','tests.question_id','=','questions.id')
            ->whereColumn('questions.correct','tests.option')->count();
         return view('pages.Students.test.count',compact('n','ids','q'));
    }
//https://shouts.dev/articles/laravel-prevent-users-from-re-submitting-form
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
