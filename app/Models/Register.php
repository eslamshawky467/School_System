<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $guarded=[];
    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
