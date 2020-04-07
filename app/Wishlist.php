<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'wishlist',
    ];


    public function customer(){
        return $this->belongsTo(User::class);
    }
}
