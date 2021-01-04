<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //button routes for manage tests
    public function indextest()
    {
        return view('usertypes.lecturer.managetests');
    }


    public function indexsicknotes()
    {
        return view('usertypes.lecturer.managesicknotes');
    }
    public function indexattend()
    {
        return view('usertypes.lecturer.manageattend');
    }
    public function indexmiscon()
    {
        return view('usertypes.lecturer.managemiscon');
    }
}
