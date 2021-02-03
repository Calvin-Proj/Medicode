<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Sick_Note;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for students
    
    public function indexbooktest()
    {
      
       return view('usertypes.student.booksicktest');
    }

    public function fileUpload(Request $request)
    {
        // $this->validate(request(),  
        //     [
        //         'sick_note' => 'required|mimes:pdf,xlx,csv|max:2048',
        //         ]);
       

        $sick_note= new Sick_Note;
        $sick_note->sick_note=$request->sick_note;
        $sick_note->user_id= auth()->user()->id;
        $sick_note->user_id=  '1';     
        $sick_note->save();
    
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

        $building=DB::table('buildings')
        ->join('venues','buildings.id','=','venues.building_id')
        ->join('tests','venues.id','=','tests.venue_id')
        ->join('modules', 'tests.module_id','=','module_id')
        ->join('module_user', 'modules.id', '=', 'module_user.module_id')
        ->join('users', 'module_user.user_id', '=', 'user_id')
        ->select('buildings.building_location' , 'tests.*','modules.module_code', 'users.name','venues.no_of_seats')
        ->first();
     
         
        
        return view('usertypes.student.testsched',compact('building'));
    }
    public function indexhelp()
    {
        return view('usertypes.student.studenthelp');
    }
}
