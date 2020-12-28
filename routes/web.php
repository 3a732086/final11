<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminOrderlistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('admin')->group(function (){
    Route::get('/',[AdminDashboardController::class, 'index'])->name('admin.dashboard.index');              //會員管理
    Route::get('members', [AdminMemberController::class, 'index'])->name('admin.members.index');
    Route::get('members/{id}/edit', [AdminMemberController::class, 'edit'])->name('admin.members.edit');
    Route::patch('members/{id}',[AdminMemberController::class, 'update'])->name('admin.members.update');
    Route::delete('members/{id}',[AdminMemberController::class, 'destroy'])->name('admin.members.destroy');

    Route::get('menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');                          //餐點管理
    Route::get('menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
    Route::post('menus/store',[AdminMenuController::class, 'store'])->name('admin.menus.store');
    Route::get('menus/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
    Route::patch('menus/{id}',[AdminMenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('menus/{id}',[AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

    Route::get('orderlists', [AdminOrderlistController::class, 'index'])->name('admin.orderlists.index');
});
