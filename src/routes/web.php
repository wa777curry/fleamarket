<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ViewController::class, 'index']);
Route::get('/auth/login', [ViewController::class, 'login']);
Route::get('/auth/register', [ViewController::class, 'register']);
Route::get('/item/comment', [ViewController::class, 'comment']);
Route::get('/item/item', [ViewController::class, 'item']);
Route::get('/mypage/profile', [ViewController::class, 'profile']);
Route::get('/purchase/address/item', [ViewController::class, 'address']);
Route::get('/purchase/item', [ViewController::class, 'purchase']);
Route::get('/mypage', [ViewController::class, 'mypage']);
Route::get('/sell', [ViewController::class, 'sell']);