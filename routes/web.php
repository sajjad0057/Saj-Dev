<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
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
Route::get('/contact',[ContactController::class,'index'] )->name('con');  // Named Routes

// ContactController::class; It just returns the class name with namespace



//Category  Controller :


Route::get('/category/all',[CategoryController::class,'AllCategory'])->name('all.category');

Route::post('/category/add',[CategoryController::class,'AddCategory'])->name('store.category');

Route::get('/category/edit/{id}',[CategoryController::class,'EditCategory'])->name('category.edit');

Route::post('/category/update/{id}',[CategoryController::class,'UpdateCategory'])->name('store.update.category');

Route::get('/category/delete/{id}',[CategoryController::class,'DeleteCategory'])->name('category.delete');

Route::get('/category/delete-parmanently/{id}',[CategoryController::class,'DeleteCategoryParmantly'])->name('category.delete.parmanently');

Route::get('/category/restore/{id}',[CategoryController::class,'RestoreCategory'])->name('category.restore');


// Brand Controller  : 
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');

Route::post('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');

Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand'])->name('brand.edit');

Route::post('/brand/update/{id}',[BrandController::class,'UpdateBrand'])->name('store.update.brand');

Route::get('/brand/delete/{id}',[BrandController::class,'DeleteBrand'])->name('brand.delete');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();  //Eloquent ORM

    //$users = DB::table('users')->get(); // Database: Query Builder

    return view('dashboard',compact('users'));
})->name('dashboard');
