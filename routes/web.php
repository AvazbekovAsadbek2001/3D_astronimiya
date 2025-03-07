<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/login', [IndexController::class, 'auntificate'])->name('auntificate');
Route::get('register', [IndexController::class, 'register'])->name('register');
Route::post('saveregister', [IndexController::class, 'saveregister'])->name('saveregister');
Route::post('/logout', [IndexController::class, 'logout'])->name('logout');

Route::group([], function(){
    Route::get('subject/{id}', [IndexController::class, 'subject'])->name('subject');
    Route::get('object/{id}', [IndexController::class, 'object'])->name('object');
});
