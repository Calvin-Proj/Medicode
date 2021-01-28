<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function indexinvighours()
    {
        return view('usertypes.invig.subhours');
    }
    public function indexhelp()
    {
        return view('usertypes.invig.invighelp');
    }
}
