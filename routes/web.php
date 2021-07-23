<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
//use Illuminate\Support\Facades\DB;  //using for Query Builder . 
use app\Models\User;

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
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is home Page ";
});


Route::get('/about', function () {
    return view('about');
}); 

//For laravel 7 or below format . this is not work for laravel 8 . 
// Route::get('/contact', 'ContactController@index' );

// For Laravel 8 
Route::get('/contact-fsjdj-fbsdgj',[ContactController::class,'index'] )->name('con');  // Named Routes

// ContactController::class; It just returns the class name with namespace



//Category Controller :

Route::get('/category/all',[CategoryController::class,'AllCategory'])->name('all.category');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();  //Eloquent ORM

    //$users = DB::table('users')->get(); // Database: Query Builder

    return view('dashboard',compact('users'));
})->name('dashboard');
