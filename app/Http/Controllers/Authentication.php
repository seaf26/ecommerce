<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function authentication(Request $request){

        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',

        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('/');

        }

        return back()->withErrors('authentication failed');

    }



    public function register(){
        return view('authentication.registration');
    }

    public function registeration(Request $request){
        $data = $request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',

        ]);


        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success','User created successfully');

    }


}


