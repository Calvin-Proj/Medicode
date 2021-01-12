<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
       
        if(auth()->user()->usertype=='admin'){
            return view('usertypes.admin.homeAdmin') ;
        }
        elseif (auth()->user()->usertype=='lecturer') {
            return view('usertypes.lecturer.homeLect') ; 
           
        }
        elseif (auth()->user()->usertype=='student') {
            return view('usertypes.student.homeStud') ;
        }
        elseif (auth()->user()->usertype=='invig') {
            return view('usertypes.invig.homeInvig'); 
        }    
    }
}
