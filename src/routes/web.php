<?php

use App\Http\Controllers\Admin\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('admin.index');
});
