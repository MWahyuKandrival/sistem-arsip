<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\RuanganController;

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

Route::get('/', [ArsipController::class, 'index'])->middleware('auth');

Route::get('/arsip/create/{ruangan_id}/{rak_id}', [ArsipController::class, 'create']);

Route::resource('/arsip', ArsipController::class);

Route::get('/getRak/{id}', [ArsipController::class, 'getRak']);

Route::resource('/ruangan', RuanganController::class);

Route::get('/rak/create/{id}', [RakController::class, 'create']);

Route::resource('/rak', RakController::class);

Route::resource('/user', UserController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store']);

Route::get('/test', function(){
    return view('test');
});