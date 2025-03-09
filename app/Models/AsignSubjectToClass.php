<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignSubjectToClass extends Model
{
     

    protected $fillable = [
        'class_id', 'subject_id',
    ];


    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}
