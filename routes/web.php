<?php

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

// USER Routes

////USER VIEW ROUTES
Route::resource('/userEnd','App\Http\Controllers\userViewController');
Route::match(['get','post'],'/','App\Http\Controllers\userViewController@indexx');
Route::match(['get','post'],'/userindex','App\Http\Controllers\userViewController@indexx');
Route::match(['get','post'],'/master','App\Http\Controllers\userViewController@master');
Route::match(['get','post'],'about','App\Http\Controllers\userViewController@about');
Route::match(['get','post'],'usercategory','App\Http\Controllers\userViewController@categories');
Route::get('/categories/{category_id}','App\Http\Controllers\userViewController@newcategories');
// 

// Middleware for User 
Route::group(['middleware' => 'auth'], function () {
//Checkout Routes
Route::match(['get','post'],'checkout','App\Http\Controllers\userViewController@checkout');
Route::resource('/checkout', 'App\Http\Controllers\CheckoutController');
// End Checkout
//Cart 
Route::resource('/cart', 'App\Http\Controllers\CartController');
//End cart
Route::match(['get','post'],'thanks','App\Http\Controllers\userViewController@thanks');

 });
// End User Middleware


Route::match(['get','post'],'contact-us','App\Http\Controllers\userViewController@contact');

Route::match(['get','post'],'fastfood','App\Http\Controllers\userViewController@fastfood');

Route::match(['get','post'],'jucies','App\Http\Controllers\userViewController@juices');
Route::match(['get','post'],'my-account','App\Http\Controllers\userViewController@myaccount');

Route::match(['get','post'],'service','App\Http\Controllers\userViewController@service');

Route::match(['get','post'],'shop-detail','App\Http\Controllers\userViewController@shopdetail');

Route::match(['get','post'],'shop','App\Http\Controllers\userViewController@shop');
Route::match(['get','post'],'traditional','App\Http\Controllers\userViewController@traditional');


Route::match(['get','post'],'wishlist','App\Http\Controllers\userViewController@wishlist');
// End User View Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {

// Route::get('/', function(){return view('admin.Dashboard.index');});
Route::get('/dashboard', function(){return view('admin.Dashboard.index');});


// Categories
Route::resource('/category', 'App\Http\Controllers\CategoryController');
Route::get('/addCategories',function(){return view('admin.Categories.add');});
// End Categories
// Products
Route::resource('/product', 'App\Http\Controllers\ProductController');
Route::match(['get','post'],'listProducts','App\Http\Controllers\ProductController@list' );
// End Products
//Resturants 
Route::resource('/resturant', 'App\Http\Controllers\ResturantController');
Route::match(['get','post'],'addResturants','App\Http\Controllers\ResturantController@add' );
//End Resturenats
//UserAdmin Details
Route::resource('/user', 'App\Http\Controllers\UserAdmin');
// End UserAdmin

});


 
// Route::resource('/checkout', 'App\Http\Controllers\CheckoutController');
