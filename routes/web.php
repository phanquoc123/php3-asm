<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\authen\AuthenController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController;
use App\Http\Middleware\isMember;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [AuthenController::class , 'showFormLogin'])->name('login'); 
Route::post('login', [AuthenController::class , 'handleLogin']);
Route::get('register', [AuthenController::class , 'showFormRegister'])->name('register'); 
Route::post('register', [AuthenController::class , 'handleRegister']);
Route::post('logout', [AuthenController::class , 'logout'])->name('logout'); 


Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth',isMember::class]);


// Route::get('login', [HomeController::class, 'showFormLoginClient'])->name('showFormLoginClient')->middleware(['auth',isMember::class]);

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('{id}/detail', [HomeController::class, 'detail'])->name('detail');
Route::get('{id}/shopByCategory', [HomeController::class, 'shopByCategory'])->name('shopByCategory');


Route::get('/cart', [CartController::class , 'index'])->name('cart');
Route::post('/addToCart', [CartController::class , 'addToCart'])->name('addToCart');
Route::put('/updateQuantityCart', [CartController::class , 'updateQuantity'])->name('updateQuantityCart');
Route::delete('/removeCart', [CartController::class , 'removeCartItem'])->name('removeCartItem');
Route::delete('/clearCart', [CartController::class , 'clearAllCart'])->name('clearAllCart');
