<?php

namespace App;

use App\Tag;
use App\Image;
use App\Review;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'unit',
        'price',
        'total',
        'category_id',
        'discount',
        'option',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
