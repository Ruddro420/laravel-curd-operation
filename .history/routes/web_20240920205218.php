<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user/add', [UserController::class, 'create'])->name('user.store');
Route::post('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/delete/{id}', [UserController::class, 'edit'])->name('user.edit');
