<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [AuthController::class, 'login']);

    Route::get('/user', [AuthController::class, 'logout']);
    Route::get('/books', [BooksController::class, 'index']);
    Route::post('/books', [BooksController::class, 'store']);
    Route::get('/books', [BooksController::class, 'show']);
    Route::put('/books/{bookId}', [BooksController::class, 'update']);
    Route::delete('/books/{bookId}', [BooksController::class, 'destroy']);
});
