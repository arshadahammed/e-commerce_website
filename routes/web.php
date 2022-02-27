<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\MainfrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[MainfrontendController::class,'index']);

Route::get('/category',[MainfrontendController::class,'category']);
Route::get('/view-category/{slug}',[MainfrontendController::class,'viewCategory']);
Route::get('category/{cate_slug}/{prod_slug}',[MainfrontendController::class,'productView']);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('/delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('/upate-cart',[CartController::class,'updateCart']);




Route::middleware(['auth',])->group(function () {

 Route::get('cart',[CartController::class,'viewCart']);
Route::get('checkout',[CheckoutController::class,'index']);
Route::post('place_order',[CheckoutController::class,'placeOrder']);


Route::get('my-orders',[UserController::class,'index']);
Route::get('view-order/{id}',[UserController::class,'view']);



    
     
});



Route::middleware(['auth', 'isAdmin'])->group(function () {

      

    Route::get('/dashboard',[FrontendController::class,'index']);
     Route::get('/cateogries',[CategoryController::class,'index']);
       
    Route::get('/add-category',[CategoryController::class,'add']);

    Route::post('/add-category',[CategoryController::class,'insert']);

    Route::get('/edit-prod/{id}',[CategoryController::class,'editProduct']);
     Route::put('/update-category/{id}',[CategoryController::class,'updateProduct']);
    Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);



   Route::get('products' ,[ProductController::class,'index']);
   Route::get('add-products' ,[ProductController::class,'add']);

    Route::post('add-product' ,[ProductController::class,'addProduct']);

     Route::get('edit-product/{id}' ,[ProductController::class,'editProduct']);

      Route::post('update-product/{id}' ,[ProductController::class,'updateProduct']);

      Route::get('delete-product/{id}' ,[ProductController::class,'deleteProduct']);

   
      Route::get('orders',[OrderController::class,'index']);

       Route::get('admin/view-order/{id}',[OrderController::class,'view']);

        Route::put('update-order/{id}',[OrderController::class,'updateOrder']);

           Route::get('order-history',[OrderController::class,'orderHistory']);

             Route::get('users',[DashboardController::class,'users']);

       

      

    
    
});

 


// Route::get("myorders" ,[ProductController::class,'myOrders']);
