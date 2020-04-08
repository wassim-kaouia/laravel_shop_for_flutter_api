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



Route::get('/', function(){
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
    
    
});
