<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function register(){

        return view('login.register');
    }

    public function registerUser(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name= $request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $registered= $user->save();

        if(!$registered){
            return redirect()->back()->with('fail', 'Something went wrong');
        }
        (new MailController)->newUser($user);
        
        return redirect()->back()->with('success', 'You have registered successfuly');

    }

    public function login(){

        return view('login.login');
    }

    public function loginUser(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginID', $user->id);
                return redirect('/');
            }else{
                return redirect()->back()->with('fail', 'Email/Password wrong, please try again');
            }
        }else{
            return redirect()->back()->with('fail', 'Email/Password wrong, please try again');
        }
    }

    public function logout(){
        
        Session::pull('loginID');
        return redirect('login');
    }
}