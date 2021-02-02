<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Misconduct;

class InvigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for invigilators
    public function indexinvigschedule()
    {
        return view('usertypes.invig.scheduleviewinvig');
    }
    public function indexinvigmiscon()
    {
        return view('usertypes.invig.submisconduct');
    }

    public function createinvigmiscon(Request $request)
    {  $this->validate(request(), 
        [
         //  'user_id' => 'required',
        //   'test_id' => 'required',
        //   'misconduct_desc' => 'required'
         ]);
 
         $misconduct= new Misconduct;
         $misconduct->user_id = $request->user_id;
         $misconduct->test_id = $request->test_id;
         $misconduct->misconduct_desc = $request->misconduct_desc;
 
         $misconduct->save();
 
         session()->flash('updated', 'Account successfully updated ');
  
       
        return redirect('/');
 
       
    }



    public function indexinvighours()
    {
        return view('usertypes.invig.subhours');
    }
    public function indexhelp()
    {
        return view('usertypes.invig.invighelp');
    }
}
