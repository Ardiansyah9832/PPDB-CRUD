<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaDBController;
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
    return view('home');
});

Route::resource('user', UserController::class);

Route::prefix('/peserta_d_b_s')->name('peserta.')->group(function() {
    Route::get('/create', [PesertaDBController::class, 'create'])->name('create');
    Route::post('/store', [PesertaDBController::class, 'store'])->name('store');
    Route::get('/', [PesertaDBController::class, 'index'])->name('home');
    Route::get('/{id}', [PesertaDBController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [PesertaDBController::class, 'update'])->name('update');
    Route::delete('/{id}', [PesertaDBController::class, 'destroy'])->name('delete');
});

Route::prefix('users')->name('user.')->group(function() {
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\UserController::class,'store'])->name('store');
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('home');
    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete');
});