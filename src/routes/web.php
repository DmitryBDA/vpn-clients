<?php

use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Admin\Main\UserController;
use App\Http\Controllers\SubscribersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscribers/{name}', [SubscribersController::class, 'show'])->name('index.subscribers.show');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('admin.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.index.users');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.index.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.index.users.store');

    Route::get('/users/{id}', [UserController::class, 'edit'])->name('admin.index.users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('admin.index.users.update');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('admin.index.users.delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
