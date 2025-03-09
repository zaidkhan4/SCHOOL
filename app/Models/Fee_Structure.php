<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee_Structure extends Model
{
    //



    public function FeeHead()
    {
        return $this->belongsTo(Feehead::class, 'feehead_id');
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    
    public function Academic_year()
    {
        return $this->belongsTo(Academic_year::class, 'academic_id');
    }
}
