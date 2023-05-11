<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup(){
        return view('user.signup');
    }
    public function saveUser(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);


        $user = User::create($validate);
        auth()->login($user);
        return redirect('/')->with('success','Account created and logged in');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $validate = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $user = Auth::getProvider()->retrieveByCredentials($validate);
            auth()->login($user);
            return redirect()->intended();
        } else {
            return view('user.login');
        }

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('user.login');
    }
}
