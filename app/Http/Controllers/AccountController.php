<?php

namespace App\Http\Controllers;

use App\User;
use App\Guests;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function show(Request $request){
        $result = User::where('id',$request->session()->get('loginID'))->get();
        $guests = Guests::where('user_id',$result[0]->id)->get();
        return view('user')->with([
            'userData'=>[
                'username'=>$result[0]->username,
                'email'=>$result[0]->email,
                'gender'=>$result[0]->gender,
                'phone'=>$result[0]->phone
            ],
            'guestsData'=>$guests->toArray()
        ]);
    }
    public function edit(Request $request){
        $user = User::find($request->session()->get('loginID'));
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        $request->session()->forget('loginStatus');
        $request->session()->put('loginStatus',$request->username);
        return redirect('/account');
    }
    public function modifyGuest(Request $request){
        $json = $request->getContent();
        $obj = json_decode($json);
        $id = $obj->id;
        $name = $obj->name;
        $phone = $obj->phone;
        $card = $obj->card;
        $gender = $obj->gender;
        $guest = Guests::find($id);
        $guest->guest_name = $name;
        $guest->guest_phone = $phone;
        $guest->guest_card = $card;
        $guest->guest_gender = $gender;
        $guest->save();
        $new = Guests::find($id);
        return response()->json($new);
    }
    public function deleteGuest(Request $request){
        $id = $request->id;
        Guests::find($id)->delete();
        return response(1);
    }
}
