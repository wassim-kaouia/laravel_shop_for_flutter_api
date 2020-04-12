<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street_name',
        'street_number',
        'city',
        'state',
        'coutry',
        'post_code',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function completed(){
        return $this->street_name.' '.$this->street_number.', '.$this->country;
    }

}
