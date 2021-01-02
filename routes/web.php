<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminOrderlistController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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



//管理員路由
Route::prefix('admin')->group(function (){
    Route::get('/',[AdminDashboardController::class, 'index'])->name('admin.dashboard.index');                              //會員管理(Dashboard)
    Route::get('members', [AdminMemberController::class, 'index'])->name('admin.members.index');                            //會員管理(顯示所有會員)
    Route::get('members/{id}/edit', [AdminMemberController::class, 'edit'])->name('admin.members.edit');                    //編輯會員資料
    Route::patch('members/{id}',[AdminMemberController::class, 'update'])->name('admin.members.update');                    //更新會員資料
    Route::delete('members/{id}',[AdminMemberController::class, 'destroy'])->name('admin.members.destroy');                 //刪除會員資料

    Route::get('menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');                                  //餐點管理(顯示所有餐點)
    Route::get('menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');                         //新增餐點
    Route::post('menus/store',[AdminMenuController::class, 'store'])->name('admin.menus.store');                            //儲存餐點
    Route::get('menus/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');                          //編輯餐點
    Route::patch('menus/{id}',[AdminMenuController::class, 'update'])->name('admin.menus.update');                          //更新餐點
    Route::delete('menus/{id}',[AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');                       //刪除餐點

    Route::get('orderlists', [AdminOrderlistController::class, 'index'])->name('admin.orderlists.index');                   //訂單管理(顯示所有訂單)
    Route::get('orderlists/{id}/edit', [AdminOrderlistController::class, 'edit'])->name('admin.orderlists.edit');           //編輯訂單
    Route::patch('orderlists/{id}',[AdminOrderlistController::class, 'update'])->name('admin.orderlists.update');           //更新訂單
    Route::delete('orderlists/{id}',[AdminOrderlistController::class, 'destroy'])->name('admin.orderlists.destroy');        //刪除訂單
});
//管理員路由

//身分驗證//


//菜單//
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); //菜單
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); //菜單個別資訊
Route::post('/products',[ProductController::class, 'store'])->middleware('auth')->name('products.store');//加入購物車
//菜單//


//購物車//

Route::get('/cartlist',[CartController::class,'index'])->name('carts.index'); //購物車列表

Route::delete('/cartlist/{id}',[CartController::class,'destroy'])->name('carts.destroy');
Route::post('/checkout',[CartController::class, 'store'])->name('carts.store');               //確認訂單
//購物車//


Route::get('/cartlist',[CartController::class,'index'])->middleware('auth')->name('carts.index'); //購物車列表
Route::delete('/cartlist/{id}',[CartController::class,'destroy'])->name('carts.destroy'); //刪除購物車內商品
Route::post('/checkout',[CartController::class, 'store'])->name('carts.store'); //購物車結帳
//購物車//


//訂單
Route::get('/orderlists',[OrderController::class,'index'])->middleware('auth')->name('orders.index'); //訂單首頁
//訂單

