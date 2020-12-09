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
Route::match(['get','post'],'/myOrder','App\Http\Controllers\userViewController@myOrder');
Route::match(['get','post'],'/myOrderItem/{id}','App\Http\Controllers\userViewController@myOrderItem');
Route::get('/categories/{category_id}','App\Http\Controllers\userViewController@newcategories');
Route::match(['get','post'],'categoryDetail/{id}','App\Http\Controllers\userViewController@categoryDetails');
Route::match(['get','post'],'productDetails/{id}','App\Http\Controllers\userViewController@productDetails');
Route::match(['get','post'],'resturantDetail/{id}','App\Http\Controllers\userViewController@resturantDetails');

// Chat bot routes

Route::get('/Botman', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');	
// Middleware for User 
Route::group(['middleware' => 'auth'], function () {
//Checkout Routes
Route::match(['get','post'],'checkout','App\Http\Controllers\userViewController@checkout');
// Route::match(['get','post'],'checkout','App\Http\Controllers\CheckoutController@Updatee');
Route::resource('/checkout', 'App\Http\Controllers\CheckoutController');
// End Checkout
//Cart 
Route::resource('/cart', 'App\Http\Controllers\CartController');
//End cart
//Order Controller
Route::resource('/orderreview', 'App\Http\Controllers\OrderController')->middleware('verified');
// end order
//Order Review

//End Order  Revew
//Thanks Pge
Route::match(['get','post'],'thanks','App\Http\Controllers\userViewController@thanks');
//End thanks page
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
Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {

// Route::get('/', function(){return view('admin.Dashboard.index');});
Route::get('/dashboard', function(){return view('admin.Dashboard.index');})->middleware('verified');


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
Route::match(['get','post'],'list','App\Http\Controllers\UserAdmin@indexx' );

// End UserAdmin
// Order Details Admin Side
Route::resource('/order', 'App\Http\Controllers\AdminOrderController');
// End Orde
// Order Item Details ADmin Side
Route::resource('/orderitem', 'App\Http\Controllers\AdminOrderItemController');
Route::match(['get','post'],'item/{id}','App\Http\Controllers\AdminOrderItemController@indexx');

});


 
// Route::resource('/checkout', 'App\Http\Controllers\CheckoutController');
