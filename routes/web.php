<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});
Route::prefix('category')->group(function(){
    Route::get('/',[CategoryController::class,'index']);
    Route::get('/add',[CategoryController::class,'add']);
    Route::post('/post-add',[CategoryController::class,'postAdd']);
    Route::get('/{id}/update',[CategoryController::class,'edit']);
    Route::post('/post-update',[CategoryController::class,'postUpdate']);
    Route::post('/{id}/delete',[CategoryController::class,'delete']);
});

Route::prefix('product')->group(function(){
    Route::get('/',[CategoryController::class,'index']);
    Route::get('/add',[CategoryController::class,'add']);
    Route::post('/post-add',[CategoryController::class,'postAdd']);
    Route::get('/{id}/update',[CategoryController::class,'edit']);
    Route::post('/post-update',[CategoryController::class,'postUpdate']);
    Route::post('/{id}/delete',[CategoryController::class,'delete']);
});