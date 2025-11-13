<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ProductController::class,'index']);
Route::get('/register',[ProductController::class,'show']);
Route::post('/products/register',[ProductController::class,'store']);
Route::get('/products/search',[ProductController::class,'search']);
Route::get('/products/sort',[ProductController::class,'sort']);
