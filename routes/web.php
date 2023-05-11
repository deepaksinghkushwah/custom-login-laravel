<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/signup', [UserController::class, 'signup'])->name('user.signup');
Route::post('/user/signup', [UserController::class, 'saveUser'])->name('user.save');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

Route::match (['get', 'post'], '/user/login', [UserController::class, 'login'])->name('user.login');
