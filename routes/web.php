<?php

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
    return view('welcome');
});

// Route hello
Route::get('/hello', [App\Http\Controllers\ProductController::class, 'getHello']);

Route::get('/get_hello_wrong', [App\Http\Controllers\ProductController::class, 'Get_Hello_Wrong']);
