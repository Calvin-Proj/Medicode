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
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::get('/lecturer', function () {
    return view('lecturer');
})->middleware(['auth'])->name('lecturer');

Route::get('/invig', function () {
    return view('invig');
})->middleware(['auth'])->name('invig');

Route::get('/student', function () {
    return view('student');
})->middleware(['auth'])->name('student');

require __DIR__.'/auth.php';
