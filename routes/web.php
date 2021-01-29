<?php

use App\Models\Campus;
use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\InvigController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AccountEdit;
use App\Http\Controllers\StudentTestSched;
use App\Models\User;
use App\Models\Module;
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


//admin routes + Multi authenticate
Route::get('/', [HomeController::class, 'index'])->name('home');
//one to one relationship test
Route::get('/read{id}', function($id)
{
  return User::find($id)->module->module_code;
});

//many to many relationship test
Route::get('/read/many',[HomeController::class, 'read']);


Route::get('/onetomany', function()
{
    $campus = Campus::find(1);

    foreach ($campus->buildings as $building) {
        echo $building->building_name;
    }

});


Route::middleware(['checkUsertype:admin'])->group(function(){

Route::get('/admin/help', [AdminController::class, 'indexhelp'])->name('adminhelp');
Route::get('/admin/managemodule', [AdminController::class, 'indexmodule'])->name('adminmanagemodules');
Route::get('/admin/managevenue', [AdminController::class, 'indexvenue'])->name('adminmanagevenues');
Route::get('/admin/managelecturer', [AdminController::class, 'indexlecturer'])->name('adminmanagelecturers');
Route::get('/admin/manageinvig', [AdminController::class, 'indexinvig'])->name('adminmanageinvigs');
Route::get('/admin/managestudent', [AdminController::class, 'indexstudent'])->name('adminmanagestudents');
//routes for admin editing account
Route::get('/admin/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/admin/edit{user}', [AccountEdit::class, 'update']);
});
//////////////////////////////////


//lecturer routes + Multi authenticate
Route::middleware(['checkUsertype:lect'])->group(function(){
// Resource Route for test.
Route::resource('tests', TestController::class);
// Route for get tests for yajra post request.
Route::get('get-tests', [TestController::class, 'getTests'])->name('get-tests');
Route::get('/lecturer/help', [LecturerController::class, 'indexhelp'])->name('lecturerhelp');
Route::get('/lecturer/managetests/add', [LecturerController::class, 'indextest'])->name('lecturermanagetest');
Route::get('/lecturer/managesicknotes', [LecturerController::class, 'indexsicknotes'])->name('lecturermanagesicknotes');
Route::get('/lecturer/manageattendants', [LecturerController::class, 'indexattend'])->name('lecturermanageattendants');
Route::get('/lecturer/viewmisconduct', [LecturerController::class, 'indexmiscon'])->name('lecturermanagemiscon');
//routes for lecturer editing account
Route::get('/lecturer/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/lecturer/edit{user}', [AccountEdit::class, 'update']);
});
/////////////////////////////////////


//invig routes + Multi authenticate
Route::middleware(['checkUsertype:invig'])->group(function(){
Route::get('/invig/help', [InvigController::class, 'indexhelp'])->name('invighelp');
Route::get('/invig/schedule', [InvigController::class, 'indexinvigschedule'])->name('invigschedules');
Route::get('/invig/submisconduct', [InvigController::class, 'indexinvigmiscon'])->name('invigmisconduct');
Route::get('/invig/subhours', [InvigController::class, 'indexinvighours'])->name('invighours');
//routes for invigilator editing account
Route::get('/invig/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/invig/edit{user}', [AccountEdit::class, 'update']);
});
/////////////////////////////////


//student routes + Multi authenticate
Route::middleware(['checkUsertype:stud'])->group(function(){
Route::resource('tests', StudentTestSched::class);
Route::get('get-tests', [StudentTestSched::class, 'getTests'])->name('get-tests');
Route::get('/student/help', [StudentController::class, 'indexhelp'])->name('studenthelp');
Route::get('/student/testschedule', [StudentController::class, 'index'])->name('studenttestsched');
Route::get('/student/booksicktest', [StudentController::class, 'indexbooktest'])->name('studentbooksicktest');
//routes for student editing account
Route::get('/student/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/student/edit{user}', [AccountEdit::class, 'update']);
});
////////////////////////////////////


require __DIR__.'/auth.php';
