<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.mainScreen');
});

// Basic Route with a Function
Route::get('/greetings', function(){
    return 'Hello World';
});


// Parameterized Route with no View
Route::get('/user/{id?}', function($id = null){
    return 'User '.$id;
});

Route::get('/user/{id}/{name}', function($id, $name){
    return 'User: '.$id. ' Name: '.$name;
});

//Encoded Forward Slashes
Route::get('/search/{search}', function(Request $request, $search){
    return $search;
})->where('search', '.*');

// Named Routes
Route::get('/', function(){
    return view('layouts.mainScreen');
})->name('home');

// Prefix Route
Route::prefix('admin')->group(function(){
    // View Route
    Route::view('/someView', 'layouts.someView');
});

// Basic Controller
Route::get('/person/{id}', [UserController::class, 'show']);