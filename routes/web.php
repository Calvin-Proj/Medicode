<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\InvigController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
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
//Main route for Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

//admin routes + Multi authenticate
Route::middleware(['checkUsertype:admin'])->group(function(){
Route::get('/admin/managemodule', [AdminController::class, 'indexmodule'])->name('adminmanagemodules');
Route::get('/admin/managevenue', [AdminController::class, 'indexvenue'])->name('adminmanagevenues');
Route::get('/admin/managelecturer', [AdminController::class, 'indexlecturer'])->name('adminmanagelecturers');
Route::get('/admin/manageinvig', [AdminController::class, 'indexinvig'])->name('adminmanageinvigs');
Route::get('/admin/managestudent', [AdminController::class, 'indexstudent'])->name('adminmanagestudents');
});
//lecturer routes + Multi authenticate
Route::middleware(['checkUsertype:lect'])->group(function(){
Route::get('/lecturer/managetests', [LecturerController::class, 'indextest'])->name('lecturermanagetest');
Route::get('/lecturer/managetests/db', [TestController::class, 'getTestLecturer'])->name('ajaxTestLectGet');
Route::get('/lecturer/managetests/add', [LecturerController::class, 'indextestAdd'])->name('lectureraddTest');
Route::get('/lecturer/managesicknotes', [LecturerController::class, 'indexsicknotes'])->name('lecturermanagesicktest');
Route::get('/lecturer/manageattendants', [LecturerController::class, 'indexattend'])->name('lecturermanageattend');
Route::get('/lecturer/managemisconduct', [LecturerController::class, 'indexmiscon'])->name('lecturermanagemiscon');
});
//invig routes + Multi authenticate
Route::middleware(['checkUsertype:invig'])->group(function(){
Route::get('/invig/schedule', [InvigController::class, 'indexinvigschedule'])->name('invigschedules');
Route::get('/invig/submisconduct', [InvigController::class, 'indexinvigmiscon'])->name('invigmisconduct');
Route::get('/invig/subhours', [InvigController::class, 'indexinvighours'])->name('invighours');
});
//student routes + Multi authenticate
Route::middleware(['checkUsertype:stud'])->group(function(){
Route::get('/student/testschedule', [StudentController::class, 'index'])->name('studenttestsched');
Route::get('/student/booksicktest', [StudentController::class, 'indexbooktest'])->name('studentbooksicktest');
});

require __DIR__.'/auth.php';
