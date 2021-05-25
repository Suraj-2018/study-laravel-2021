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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/update-user', [App\Http\Controllers\HomeController::class, 'update'])->name('update-user');
Route::get('/admin-edit-user/{id}', [App\Http\Controllers\HomeController::class, 'adminEdit'])->name('admin-edit-user');
Route::post('/update-admin-user', [App\Http\Controllers\HomeController::class, 'updateAdminUser'])->name('update-admin-user');
Route::get('/admin-delete-user/{id}', [App\Http\Controllers\HomeController::class, 'adminDelete'])->name('admin-delete-user');
