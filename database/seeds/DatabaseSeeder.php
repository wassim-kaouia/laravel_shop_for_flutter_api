<?php

use App\Tag;
use App\Role;
use App\Unit;
use App\User;
use App\Image;
use App\Review;
use App\Address;
use App\Product;
use App\Category;
use App\role_user;
use App\product_tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Unit::class,4)->create();
        factory(Product::class,100)->create();
        factory(Image::class,200)->create();
        factory(Address::class,100)->create();
        factory(User::class,30)->create();
        factory(User::class)->states('user-admin')->create();
        factory(Review::class,300)->create();
        factory(Category::class,5)->create();
        factory(Tag::class,10)->create();
        factory(product_tag::class,100)->create();
        factory(Role::class,3)->create();
        factory(role_user::class,31)->create();
    }
}
