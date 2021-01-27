<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
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
            // gets the modules the user takes
            $id= auth()->user()->id;

            $user=User::find($id)->modules()->get();
            $count_Module=count($user);

            return view('usertypes.lecturer.homeLect')->with('count_Module',$count_Module);

        }







        elseif (auth()->user()->usertype=='student') {

            $id= auth()->user()->id;

            $user=User::find($id)->modules()->get();
            $count_Module=count($user);

            return view('usertypes.student.homeStud')->with('count_Module',$count_Module);
        }






        elseif (auth()->user()->usertype=='invig') {
            return view('usertypes.invig.homeInvig');
        }
    }

    public function read()
    {


    }
}
