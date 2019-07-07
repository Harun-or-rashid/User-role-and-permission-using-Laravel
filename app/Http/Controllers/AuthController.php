<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLogin()
    {

        return view('partial.login');
    }

    public function SubmitLogin(Request $request)
    {
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            ]))
        {
            if (Auth::user()->user_type=='super admin'){
                return redirect()->route('super.dashboard');
            }
            elseif(Auth::user()->user_type=='gadmin') {
                return redirect()->route('admin.dashboard');
            }
            else{
                return"Ops!  maybe you're not a admin";
            }
        }
        else{
            return redirect()->back();
        }
    }

        public function ShowRegister()
        {
      return view('partial.MemberRegister');

        }
    public function MemberRegister(Request $request)
    {
        $valid=$request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required',
            'user_type'=>'required',
            'address'=>'',

        ]);

        User::create($valid);


//        $user->name=$request->name;
//        $user->phone=$request->phone;
//        $user->email=$request->email;
//        $user->user_type=1;
//        $user->address=$request->address;
//        $user->password=bcrypt($request->password);
//        $user->save();
////        return redirect()->route('register');
        return redirect('registration');
    }


}
