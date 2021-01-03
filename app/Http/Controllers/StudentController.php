<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for students
    public function indextestsched()
    {
        return view('usertypes.student.testsched');
    }
    public function indexbooktest()
    {
        return view('usertypes.student.booksicktest');
    }
    public function index()
    {

    }
}
