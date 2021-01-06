<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function edit($userid)
    {
        $user = User::find($userid);

        return view('usertypes.lecturer.editAccount')->with('user',$user);
    }

    public function update($userid)
    {
       $this->validate(request(), 
       [
           'name' => 'required|min:3|string',
          'email' => 'required|email',
          'password' => 'required|min:6'
       ]);

       $data = request()->all();
       $user = User::find($userid);

       $user->name= $data['name'];
       $user->email= $data['email'];
       $user->password= $data['password'];

       $user->save();

       dd($user);

       //return redirect('/');

       



    }
}
