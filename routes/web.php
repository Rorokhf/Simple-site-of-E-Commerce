<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\brand\BrandController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\category\CategoriesController;
use App\Http\Controllers\admin\category\SubCategoriesController;
use App\Http\Controllers\frontend\index\HomeController;
use App\Http\Controllers\frontend\index\IndexController;
use App\Http\Controllers\frontend\product\CartController;
use App\Http\Livewire\ProductsTable;

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
    return view('frontend.home.index');
});
Route::get('phone',[UserController::class,'phone']);

//////////////// user//////////////////

Route::group(['prefix'=>'Users'],function(){
    Route::get('login',[UserController::class,'login'])->name('loginUser');
    Route::get('Register',[UserController::class,'Register'])->name('RegisterUser');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeUser');
    Route::get('profile}',[UserController::class,'profile'])->name('profile');
    Route::get('order',[UserController::class,'order'])->name('order');

    });

Auth::routes(['verify'=>true]);


// ///////////////////////////////// Admin //////////////////////////

Route::group(['prefix'=>'Admin'],function(){
    Route::get('home',[AdminController::class,'home'])->name('home');
    Route::resource('product',ProductController::class);
    Route::resource('category',CategoriesController::class);
    Route::resource('subCategory',SubCategoriesController::class);
    Route::resource('brand',BrandController::class);
});
/////////////////////////////front end ///////////////////
Route::group(['prefix'=>'web'],function(){

    Route::resource('index', HomeController::class);
    Route::get('product-details/{id}',[IndexController::class,'detialpro'])->name('product-details');
    Route::get('wishlist',[IndexController::class,'wishlist'])->name('wishlist');
   Route::resource('cart', CartController::class);
});
// Route::get('/', [IndexController::class, 'index'])
//     ->name('products.index');
// Route::post('/', [\App\Http\Controllers\CartController::class, 'store'])
//     ->name('cart.store');
