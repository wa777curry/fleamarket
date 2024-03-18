<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
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
Route::get('/mylist', [ViewController::class, 'mylist'])->name('mylist');
Route::get('/search', [ViewController::class, 'search'])->name('search');

Route::get('/item/{id}', [ItemController::class, 'item'])->name('item');
Route::get('/comment/{id}', [CommentController::class, 'comment'])->name('comment');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');

// ログイン後の承認ページ
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/mypage', [MypageController::class, 'mypage'])->name('mypage');
    Route::get('/purchase', [MypageController::class, 'purchase'])->name('purchase');
    Route::get('/mypage/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/mypage/profile', [ProfileController::class, 'postProfile'])->name('postProfile');

    Route::get('/sell', [SellController::class, 'sell'])->name('sell');
    Route::post('/sell', [SellController::class, 'postSell'])->name('postSell');

    Route::get('/purchase/{id}', [PurchaseController::class, 'getPurchase'])->name('getPurchase');
    Route::post('/purchase/{id}', [PurchaseController::class, 'postPurchase'])->name('postPurchase');
    Route::get('/thanks', [PurchaseController::class, 'thanks'])->name('thanks');

    Route::get('/purchase/address/{id}', [PurchaseController::class, 'address'])->name('address');
    Route::post('/purchase/address/{id}', [PurchaseController::class, 'postAddress'])->name('postAddress');

    Route::post('/comment/{id}', [CommentController::class, 'postComment'])->name('postComment');
    Route::delete('/comment/{id}', [CommentController::class, 'deleteComment'])->name('deleteComment');

    Route::post('/like/{item}', [LikeController::class, 'like'])->name('like');
    Route::post('/nolike/{item}', [LikeController::class, 'nolike'])->name('nolike');
});

// 管理者用
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'getAdminLogin'])->name('getAdminLogin');
    Route::post('/login', [AdminController::class, 'postAdminLogin'])->name('postAdminLogin');
});

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::delete('/admin/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/comment-list', [AdminController::class, 'commentList'])->name('commentList');
    Route::delete('/comment-list/{id}', [AdminController::class, 'deleteUserComment'])->name('deleteUserComment');

    Route::get('/mail/{id}', [MailController::class, 'mail'])->name('mail');
    Route::post('/mail', [MailController::class, 'postMail'])->name('postMail');

    Route::get('/admin/logout', [AdminController::class, 'logout']);
});
