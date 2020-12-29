<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\InvigController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//admin routes
Route::get('/admin/managemodule', [AdminController::class, 'indexmodule'])->name('adminmanagemodules');
Route::get('/admin/managevenue', [AdminController::class, 'indexvenue'])->name('adminmanagevenues');
Route::get('/admin/managelecturer', [AdminController::class, 'indexlecturer'])->name('adminmanagelecturers');
Route::get('/admin/manageinvig', [AdminController::class, 'indexinvig'])->name('adminmanageinvigs');
Route::get('/admin/managestudent', [AdminController::class, 'indexstudent'])->name('adminmanagestudents');
//lecturer routes
Route::get('/lecturer/managetests', [LecturerController::class, 'indextest'])->name('lecturermanagetest');
Route::get('/lecturer/managesicknotes', [LecturerController::class, 'indexsicknotes'])->name('lecturermanagesicktest');
Route::get('/lecturer/manageattendants', [LecturerController::class, 'indexattend'])->name('lecturermanageattend');
Route::get('/lecturer/managemisconduct', [LecturerController::class, 'indexmiscon'])->name('lecturermanagemiscon');
//invig routes
Route::get('/invig/schedule', [InvigController::class, 'indexinvigschedule'])->name('invigschedules');
Route::get('/invig/submisconduct', [InvigController::class, 'indexinvigmiscon'])->name('invigmisconduct');
Route::get('/invig/subhours', [InvigController::class, 'indexinvighours'])->name('invighours');
//student routes
Route::get('/student/testschedule', [StudentController::class, 'indextestsched'])->name('studenttestsched');
Route::get('/student/booksicktest', [StudentController::class, 'indexbooktest'])->name('studentbooksicktest');

require __DIR__.'/auth.php';
