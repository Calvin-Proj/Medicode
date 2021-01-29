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
       
        $data=auth()->user()->usertype;
        switch ($data) {

            case 'admin':
                return view('usertypes.admin.homeAdmin') ;
                break;






            case 'lecturer':
                $id= auth()->user()->id;

                $modules=User::find($id)->modules()->get();
                $count_Module=count($modules);

               // $students_lect=model::find()->user()->get();
               
                //dd($modules);
       

                return view('usertypes.lecturer.homeLect',compact('count_Module','modules')); 

            
                break;

    





            case 'student':
                $id= auth()->user()->id;

                $user=User::find($id)->modules()->get();
                $count_Module=count($user);
    
                return view('usertypes.student.homeStud')->with('count_Module',$count_Module);
                break;







            case 'invig':
                return view('usertypes.invig.homeInvig');
                break;

            default:
               
                break;
        }


    }

    public function read()
    {


    }
}
