<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Building;
use App\Models\Venue;
use App\Models\Test;

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
                $users=User::where('usertype', 'lecturer')->get();
                $users_lect=count($users);
               

                $users=User::where('usertype', 'student')->get();
                $users_stud=count($users);


                $users=User::where('usertype', 'invig')->get();
                $users_invig=count($users);

                $users=User::where('usertype', 'invig')->get();
                $users_invig=count($users);

                $modules=Module::all();
                $count_Modules=count($modules);

                $buildings=Building::all();
                $count_Buildings=count($buildings);

                $venues=Venue::all();
                $count_Venues=count($venues);

                $tests=Test::where('test_type', 'Standard Test')->get();
                $count_Tests=count($tests);

                $sick_tests=Test::where('test_type', 'Sick Test')->get();
                $count_sTests=count($sick_tests);


                 $currentDate = date("Y-m-d");

                 $tests_completed = Test::where('test_date','<',$currentDate)
                 ->where('test_type', 'Standard Test')->get();
                 $count_CompletedT=count($tests_completed);

                 $sTests_completed = Test::where('test_date','<',$currentDate)
                 ->where('test_type', 'Sick Test')->get();
                 $count_CompletedS = count($sTests_completed);

                return view('usertypes.admin.homeAdmin', compact('users_lect','users_stud','users_invig','count_Modules','count_Venues','count_Tests','count_sTests','count_CompletedT','count_CompletedS'));
                break;


            case 'lecturer':
                $id= auth()->user()->id;

                $module=User::find($id)->modules()->first();
               


                // $stud_modCodes_arr= array();
                // $i=0;
                // foreach ( $modules as  $module) {
                //     $stud_modCodes_arr[$i]= $module->module_code;
                //     $i=$i+1;
                // }


                $lect_studs=User::has('modules')->where('usertype','student')->get();
                $lect_studs_count = count($lect_studs);

               $tests=Test::find($module->module_name);
              
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




                return view('usertypes.lecturer.homeLect',compact('module','lect_studs','lect_studs_count'));


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
