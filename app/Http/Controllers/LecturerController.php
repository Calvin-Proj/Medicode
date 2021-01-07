<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchPassword;
use Illuminate\Support\Facades\Hash;

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
          'currentPassword' => ['required', new MatchPassword]
        ]);

       $data = request()->all();
       $user = User::find($userid);  
       $user->name= $data['name'];
       $user->email= $data['email'];

      if($data["newPassword"]=='')
        { 
           
        }
        else 
        {   
           
        $this->validate(request(), 
         [  
            'newPassword' => 'min:6',
            'confirmPassword' => ['same:newPassword']
         ]);

         $user->password= Hash::make($data['newPassword']);
            }
  
        $user->save();

        session()->flash('updated', 'Account successfully updated ');
 
      // dd($user->password);
       return redirect('/');

    }



     // dd( Hash::check($data['currentPassword'], auth()->user()->password));
    //  if(!Hash::check($data['currentPassword'], $user->password)){
    //       dd('Return error with current passowrd is not match.');
    //     }else{
     //       dd('Write here your update password code');
          }      //   }