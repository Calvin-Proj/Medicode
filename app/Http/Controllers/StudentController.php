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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('usertypes.student.testsched');
    }
    public function indexhelp()
    {
        return view('usertypes.student.studenthelp');
    }
}
