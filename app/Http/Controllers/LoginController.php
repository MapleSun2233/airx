<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('get')){
            if($request->session()->get('loginStatus'))
                return redirect('/account');
            return view('login');
        }else{
            $result = User::where('username',$request->username)->get();
            if(count($result) == 1 && $result->toArray()[0]['password'] == $request->password){
                $request->session()->put('loginID',$result[0]->id);
                $request->session()->put('loginStatus',$result[0]->username);
                return redirect('/account');
            }else{
                return redirect('/login')->with('message','Login failed, please check your account!');
            }
        }
    }
    public function exit(Request $request){
        $request->session()->forget('loginStatus');
        $request->session()->forget('loginID');
        return redirect('/login');
    }
    public function register(Request $request){
        if($request->isMethod('get')){
            return view('register');
        }else{
            $user = new User;
            $result = $user->where('username',$request->username)->get();
            if(count($result) == 1){
                return redirect('/register')->with('message','The user name already exists!');
            }else{
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = $request->password;
                $user->gender = $request->gender;
                $user->phone = $request->phone;
                $user->save();
                return redirect('/login');
            }
        }
    }
}
