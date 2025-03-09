<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherTimetable extends Model
{


    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'day_id',
        'start_time',
        'end_time',
        'room_no',
    ];


    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }

}
