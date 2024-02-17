<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

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

Route::get('/', [ViewController::class, 'index'])->name('index');

Route::get('/item/comment', [ViewController::class, 'getComment'])->name('getComment');

Route::get('/purchase/address/item', [ViewController::class, 'address']);
Route::get('/purchase/item', [ViewController::class, 'purchase']);

Route::get('/sell', [SellController::class, 'getSell'])->name('getSell');

Route::get('/item/{id}', [ItemController::class, 'getItem'])->name('getItem');

Route::get('/login', [UserController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [UserController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');

Route::post('/like/{item}', [LikeController::class, 'like'])->name('like');
Route::post('/nolike/{item}', [LikeController::class, 'nolike'])->name('nolike');

Route::post('/upload', [ViewController::class, 'upload']);

// ログイン後の承認ページ
Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/mypage', [MypageController::class, 'getMypage'])->name('getMypage');
    Route::get('/mypage/profile', [ProfileController::class, 'getProfile'])->name('getProfile');
    Route::post('/mypage/profile', [ProfileController::class, 'postProfile'])->name('postProfile');

    Route::post('/sell', [SellController::class, 'postSell'])->name('postSell');
});


// 管理者用
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'getAdminLogin'])->name('getAdminLogin');
    Route::post('/login', [AdminController::class, 'postAdminLogin'])->name('postAdminLogin');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'viewAdmin'])->name('viewAdmin');
    Route::get('/admin/logout', [AdminController::class, 'logout']);
});
