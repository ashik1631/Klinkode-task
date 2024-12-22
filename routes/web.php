<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\ProductController;
use Illuminate\Support\Facades\Route;


//frontend routes
//basic route

Route::get('/', function () {
    return view('layouts.backend');
});

//Route::get('/admin/category',[categoryController::class,'index'])->name('category.index');
//group route
Route::prefix('admin/')->name('admin.')->group(function () {
    //category route
    Route::resource('category', CategoryController::class);

    //product route
    Route::resource('product', ProductController::class);
});
