<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic_year extends Model
{
    protected $guarded = [];


    public function feeheads()
    {
        return $this->belongsToMany(Academic_year::class, 'Academic_Feehead');
    }


}
