<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login',  [LoginController::class, 'api_login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout',  [LoginController::class, 'api_logout']);

    Route::get('subjects', [IndexController::class, 'api_subjects']);
    Route::get('subject', [IndexController::class, 'api_subject']);

    Route::get('categories', [IndexController::class, 'api_categories']);
    Route::get('category/books', [IndexController::class, 'api_books']);
    Route::get('book', [IndexController::class, 'api_book']);

    Route::get('tests', [IndexController::class, 'api_tests']);
    Route::post('tests/perform', [IndexController::class, 'api_perform']);
    Route::post('tests/submit', [IndexController::class, 'api_submit']);
});


