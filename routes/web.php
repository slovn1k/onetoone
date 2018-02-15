<?php

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

use App\User;
use App\Adress;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function() {
    $user = User::findOrFail(1);

    $address = new Adress(['name' => 'Muzicescu 21 B']);

    $user->adress()->save($address);
});

Route::get('/update', function (){
   $adress = Adress::where('user_id', '1')->first();
   $adress->name = 'New updated name';
   $adress->save();
});

Route::get('/read', function (){
   $user = User::findOrFail(1);
   return $user->adress->name;
});


Route::get('/delete/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
});