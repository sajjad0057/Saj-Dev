<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultipicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileInfoManageController;
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


// for verification email : 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');




Route::get('/', [HomeController::class,'AllData'])->name('home');

Route::get('/home', function () {
    echo "This is home Page ";
});


Route::get('/about', function () {
    return view('about');
}); 


//Category  Controller :


Route::get('/category/all',[CategoryController::class,'AllCategory'])->name('all.category')->middleware('auth');

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



// Multi Image
Route::get('/all/images',[MultipicController::class,'MultiImage'])->name('multi.image');

Route::post('/store/image',[MultipicController::class,'AddMultiImage'])->name('store.multi.image');



// Slider 

Route::get('/slide/all',[SlideController::class,'AllSlide'])->name('all.slide');

Route::get('/slide/add',[SlideController::class,'AddSlide'])->name('add.slide');

Route::post('/slide/store',[SlideController::class,'StoreSlide'])->name('store.slide');

Route::get('/slide/edit/{id}',[SlideController::class,'EditSlide'])->name('slide.edit');

Route::post('/slide/update/{id}',[SlideController::class,'UpdateSlide'])->name('store.update.slide');

Route::get('/slide/delete/{id}',[SlideController::class,'DeleteSlide'])->name('slide.delete');


// About 
// Group Route : 

Route::prefix('/about')->group(function (){

    Route::get('/all',[AboutController::class,'AllAbout'])->name('all.about');

    Route::get('/add',[AboutController::class,'AddAbout'])->name('add.about');

    Route::post('/store',[AboutController::class,'StoreAbout'])->name('store.about');
    
    Route::get('/edit/{id}',[AboutController::class,'EditAbout'])->name('about.edit');
    
    Route::post('/update/{id}',[AboutController::class,'UpdateAbout'])->name('store.update.about');
    
    Route::get('/delete/{id}',[AboutController::class,'DeleteAbout'])->name('about.delete');

});


// Contact Profile 

Route::prefix('/contact')->group(function (){


    Route::get('/',[ContactController::class,'Contact'])->name('contact');

    Route::get('/all',[ContactController::class,'AllContact'])->name('all.contact')->middleware('auth');

    Route::post('/store',[ContactController::class,'StoreContact'])->name('store.contact')->middleware('auth');
    
    Route::get('/edit/{id}',[ContactController::class,'EditContact'])->name('contact.edit')->middleware('auth');
    
    Route::post('/update/{id}',[ContactController::class,'UpdateContact'])->name('store.update.contact')->middleware('auth');
    
    Route::get('/delete/{id}',[ContactController::class,'DeleteContact'])->name('contact.delete')->middleware('auth');

    Route::get('/message',[ContactController::class,'ContactMessage'])->name('contact.message')->middleware('auth');

});



// update profile info : 

Route::prefix('/profile')->group(function (){


    Route::get('/password',[ProfileInfoManageController::class,'ChangePassword'])->name('change.password');

    Route::any('/password-update',[ProfileInfoManageController::class,'UpdatePassword'])->name('password.update');

    Route::get('/info',[ProfileInfoManageController::class,'UserProfile'])->name('user.profile');
    Route::post('/info',[ProfileInfoManageController::class,'UpdateProfile'])->name('update.profile');


});




// Authentication 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index',);
})->name('dashboard');



Route::get('/user/logout',[AuthController::class,'Logout'])->name('user.logout');