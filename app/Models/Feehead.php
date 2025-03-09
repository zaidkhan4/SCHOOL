<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feehead extends Model
{


    protected $guarded = [];


    public function feestructure()
    {
        return $this->belongsToMany(Feehead::class, 'Academic_Feehead');
    }


}
