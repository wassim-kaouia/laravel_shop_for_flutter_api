<?php

namespace App;

use App\Role;
use App\Order;
use App\Address;
use App\Payment;
use App\Shipment;
use App\Wishlist;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'shipping_address',
        'billing_address',
    ];


    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function shipments(){
        return $this->hasMany(Shipment::class);
    }

    public function shippingAddress(){
        return $this->hasOne(Address::class,'id','shipping_address');
    }

    public function billingAddress(){
        return $this->hasOne(Address::class,'id','billing_address');
    }
   
    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function boot(){
        parent::boot();

        static::deleting(function(User $user){
            $user->shippingAddress()->delete();
            $user->billingAddress()->delete();
        });
    }
}
