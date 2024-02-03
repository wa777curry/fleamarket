<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('/register', [ViewController::class, 'register']);
Route::get('/item/comment', [ViewController::class, 'comment']);
Route::get('/item/item', [ViewController::class, 'item']);
Route::get('/mypage/profile', [ViewController::class, 'profile']);
Route::get('/purchase/address/item', [ViewController::class, 'address']);
Route::get('/purchase/item', [ViewController::class, 'purchase']);
Route::get('/mypage', [ViewController::class, 'mypage']);
Route::get('/sell', [ViewController::class, 'sell']);

Route::get('/login', [UserController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');

Route::post('/upload', [ViewController::class, 'upload']);


// 管理者用
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'getAdminLogin'])->name('getAdminLogin');
    Route::post('/login', [AdminController::class, 'postAdminLogin'])->name('postAdminLogin');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'viewAdmin'])->name('viewAdmin');
});