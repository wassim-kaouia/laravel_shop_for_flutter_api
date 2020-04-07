<?php

namespace App;

use App\City;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'states';


    public function cities(){
        return $this->hasMany(City::class,'state_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
