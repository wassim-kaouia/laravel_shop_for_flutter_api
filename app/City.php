<?php

namespace App;

use App\State;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'cities';


    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }


    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }
}
