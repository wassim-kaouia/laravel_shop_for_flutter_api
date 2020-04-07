<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
