<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('books/create/{isbn}', [BookController::class, 'create']);
Route::post('books/delete/{isbn}', [BookController::class, 'destroy']);
Route::get('books', [BookController::class, 'index']);
Route::get('books/{isbn}', [BookController::class, 'show']);
