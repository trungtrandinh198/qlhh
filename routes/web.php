<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DasboarController;
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

Route::get('/',[DasboarController::class,'index']);
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('/add',[CategoryController::class,'create'])->name('create');
    Route::post('/post-add',[CategoryController::class,'store'])->name('store');
    Route::get('/{id}/update',[CategoryController::class,'edit'])->name('edit');
    Route::post('/post-update',[CategoryController::class,'update'])->name('update');
    Route::post('/{id}/delete',[CategoryController::class,'destroy'])->name('destroy');
});

Route::prefix('product')->name('product.')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/add',[ProductController::class,'create'])->name('create');
    Route::post('/post-add',[ProductController::class,'store'])->name('store');
    Route::get('/{id}/update',[ProductController::class,'edit'])->name('edit');
    Route::post('/post-update',[ProductController::class,'update'])->name('update');
    Route::post('/{id}/delete',[ProductController::class,'destroy'])->name('destroy');
});