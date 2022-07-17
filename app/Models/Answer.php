<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='tests';
    protected $guarded=[];
    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze','quizze_id');

    }
    public function questions()
    {
        return $this->belongsTo('App\Models\Question','question_id');

    }
}
