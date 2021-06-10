<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

//Route::post('/register', 'AuthController@AuthController')->name('Register');
Route::get('/', [BookController::class, 'ListBook'])->name('user.home');
Route::post('/register', [AuthController::class, 'Register'])->name('Register');
Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['prefix'=>'user'], function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/addbook', [BookController::class, 'getAddBook'])->name('user.getaddbook');
    Route::post('/addbook', [BookController::class, 'postAddBook'])->name('user.postaddbook');
    Route::get('/reviewbook/{id}', [BookController::class, 'reviewBook'])->name('user.reviewBook');
    Route::post('/comment/{id}', [BookController::class, 'Comment'])->name('user.comment');
});
Route::group(['prefix'=>'admin'], function () {
    Route::get('/listbook', [AdminController::class, 'ListBook'])->name('adListBook')->middleware('admin');
    Route::get('/listuser',[AdminController::class, 'ListUser'])->name('adListUser')->middleware('admin');
    Route::post('/delete', [AdminController::class, 'Delete'])->name('delete')->middleware('admin');
});

