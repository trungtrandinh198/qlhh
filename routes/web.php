<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('admin.index');
});
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('/add',[CategoryController::class,'add'])->name('add');
    Route::post('/post-add',[CategoryController::class,'postAdd'])->name('postAdd');
    Route::get('/{id}/update',[CategoryController::class,'update'])->name('update');
    Route::post('/post-update',[CategoryController::class,'postUpdate'])->name('postUpdate');
    Route::post('/{id}/delete',[CategoryController::class,'delete'])->name('delete');
});

Route::prefix('product')->name('product.')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/add',[ProductController::class,'add'])->name('add');
    Route::post('/post-add',[ProductController::class,'postAdd'])->name('postAdd');
    Route::get('/{id}/update',[ProductController::class,'update'])->name('update');
    Route::post('/post-update',[ProductController::class,'postUpdate'])->name('postUpdate');
    Route::post('/{id}/delete',[ProductController::class,'delete'])->name('delete');
});