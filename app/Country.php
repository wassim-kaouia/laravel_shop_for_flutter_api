<?php

namespace App;

use App\City;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'countries';


    public function cities(){
        return $this->hasMany(City::class,'country_id','id');
    }

    public function states(){
        return $this->hasMany(State::class,'country_id','id');
    }
}
