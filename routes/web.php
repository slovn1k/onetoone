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

Route::get('/insert/{id}', function($id) {
    $user = User::findOrFail($id);

    $address = new Adress(['name' => 'Muzicescu 21 B']);

    $user->adress()->save($address);

    return "A new adress has been inserted succesfully!!!";
});

Route::get('/update/{id}', function ($id){
   $adress = Adress::where('user_id', $id)->first();
   $adress->name = 'New updated name';
   $adress->save();

   return "Update has been done with success!!!";
});

Route::get('/read', function (){
   $user = User::findOrFail(1);
   return $user->adress->name;
});


Route::get('/delete/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();

    return "Deleting has been successfully!!!";
});