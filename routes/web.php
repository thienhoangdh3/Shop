<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminNickController;
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

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomePageController::class, 'view'])->name('home.view');
Route::get('/buy/{id}', [HomePageController::class, 'buy'])->name('home.buy');
 
Route::prefix('login')->group(function () {
    Route::get('/',                 [LoginController::class, 'index'])      ->name('login');
    Route::post('/',                [LoginController::class, 'postLogin'])  ->name('post.login');
    Route::get('google',            [LoginController::class, 'loginGoogle'])->name('login.google');
    Route::get('/google/callback',  [LoginController::class, 'loginGoogleCallback']);
});

Route::get('logout',        [LoginController::class, 'logout'])             ->name('logout');
Route::get('registration',  [LoginController::class, 'registration'])       ->name('registration');
Route::post('registration', [LoginController::class, 'postRegistration'])   ->name('post.registration');

Route::get('forget',        [LoginController::class, 'forget'])             ->name('forget');
Route::post('forget',       [LoginController::class, 'postForget'])         ->name('post.forget');

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index']) ->name('user-profile');
    Route::get('my-order/{id}', [ProfileController::class, 'myOrder'])->name('my-order');
});

// Trang Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']) ->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get ('/', [AdminController::class, 'listUser'])->name('admin.user.list');
        Route::post('/', [AdminController::class, 'postFile'])->name('postfile');
    });
    
    Route::prefix('nick')->group(function () {
        Route::get ('/',           [AdminNickController::class, 'index']) ->name('nick.index');
        Route::get ('create',      [AdminNickController::class, 'create'])->name('nick.create');
        Route::post('create',      [AdminNickController::class, 'store']) ->name('nick.store');
        Route::get ('/{id}',       [AdminNickController::class, 'view']);
        Route::get ('/edit/{id}',  [AdminNickController::class, 'edit'])  ->name('nick.edit');
        Route::put ('/edit/{id}',  [AdminNickController::class, 'update'])->name('nick.update');
        Route::get ('delete/{id}', [AdminNickController::class, 'delete'])->name('nick.delete');
    });
});
