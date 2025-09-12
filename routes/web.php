<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------  s-------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/reja', [IndexController::class, 'reja'])->name('reja');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auntificate'])->name('auntificate');
Route::post('saveregister', [LoginController::class, 'saveregister'])->name('saveregister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth:student'], function(){
    Route::post('savesetting', [UserController::class, 'setting'])->name('setting');
    Route::get('sections', [UserController::class, 'sections'])->name('sections');

    Route::get('/categories', [UserController::class , 'categories'])->name('categories');
    Route::get('/{category_id}/books', [UserController::class, 'books'])->name('books');

    Route::get('subjects', [UserController::class, 'subjects'])->name('subjects');
    //Mavzuni ko'rsatish
    Route::get('subject/{id}', [UserController::class, 'subject'])->name('subject');

    Route::get('listtest', [UserController::class, 'tests'])->name('tests');
    //Testni bajarish
    Route::get('perform/{id}', [UserController::class, 'perform'])->name('test.perform');
    //Testni topshirish
    Route::post('submit', [UserController::class, 'submit'])->name('submit');
    //Natijani ko'rsatish
    Route::get('confirtest/{test_id}', [UserController::class, 'confirmtest'])->name('confirmtest');
});

Route::get('object/{id}', [UserController::class, 'object'])->name('object');

Route::post('getdistrict', [AjaxController::class, 'getdistrict'])->name('ajax.district');
