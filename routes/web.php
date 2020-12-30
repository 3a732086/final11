<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
//首頁路由//
Route::get('/',[HomeController::class, 'index'])->name('home.index');
Route::get('/home',[HomeController::class, 'login_index'])->middleware('auth')->name('home.login_index');
//首頁路由//

//身分驗證//
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//身分驗證//


//菜單//
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); //菜單
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); //菜單個別資訊
Route::post('/products',[ProductController::class, 'store'])->middleware('auth')->name('products.store');//加入購物車
//菜單//


//購物車//
Route::get('/cartlist',[CartController::class,'index'])->name('carts.index'); //購物車列表
