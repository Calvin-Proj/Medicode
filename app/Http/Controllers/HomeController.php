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


                // $stud_modCodes_arr= array();
                // $i=0;
                // foreach ( $modules as  $module) {
                //     $stud_modCodes_arr[$i]= $module->module_code;
                //     $i=$i+1;
                // }


                $lect_studs=User::has('modules')->get();
            //     foreach ($lect_studs as $lect_stud) {
            //        if ($lect_stud->usertype == 'student') {
            //         dd($lect_stud);
            //        }
            //    }
                //dd($stud_modCodes_arr);
                // $lect_studs=User::whereHas('modules',function($q,$stud_modCodes_arr){
                //     $q->whereIn('module_code',[$stud_modCodes_arr]);
                // })->get();
                // foreach ($lect_studs as $lect_stud) {
                //     echo($lect_stud->name);
                // }




                return view('usertypes.lecturer.homeLect',compact('count_Module','modules','lect_studs'));


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
    public function indexlanding()
    {
        return view('landingpage.landingpage');
    }
}
