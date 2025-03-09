<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignStudentToClass extends Model
{


    protected $fillable = [
        'class_id', 'subject_id','student_id',
    ];


    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


}
