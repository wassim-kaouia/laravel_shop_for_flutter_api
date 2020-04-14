<?php

use App\City;
use App\State;
use App\Country;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/index', function(){
    return view('index');
})->middleware('auth');

//testing cities/states/countries:

// Route::get('city',function(){
//     return City::with(['state','country'])->paginate(50);
// });

// Route::get('country',function(){
//     return Country::with(['states','cities'])->paginate(5);
// });

// Route::get('state',function(){
//     return State::with(['cities','country'])->paginate(50);
// });

//end testing

Route::get('logout',function(){
    return redirect()->route('login');
});


Auth::routes();



Route::group(['middleware' => ['auth']], function () {

    //units 
    Route::get('units','UnitController@index')->name('units');
    Route::post('units','UnitController@store');
    Route::put('units','UnitController@update');
    Route::delete('units','UnitController@delete');
    Route::match(['get', 'post'],'search-units','UnitController@search')->name('search-units');

    //users
    Route::get('users','UserController@index')->name('users');
    Route::post('users','UserController@store');
    Route::put('users','UserController@update');
    Route::delete('users','UserController@delete');
    Route::get('users/{id}','UserController@profile')->name('users-profile');
    Route::get('users-search','UserController@search')->name('users-search');
    Route::post('users-upload-image/{id}','UserController@uploadProfileImage')->name('users-image');

    //products
    Route::get('products','ProductController@index')->name('products');
    Route::post('products','ProductController@store');
    Route::put('products','ProductController@update');
    Route::delete('products','ProductController@delete');
    Route::get('products/{id}','ProductController@profile')->name('products-detail');
    Route::get('products-search','ProductController@search')->name('products-search');
    
});
