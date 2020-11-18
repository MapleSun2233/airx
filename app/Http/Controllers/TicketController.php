<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flights;
class TicketController extends Controller
{
    //
    public function buy($id,$travelClass,Request $request){
        if($request->session()->get('loginStatus')){
            $flights = new Flights();
            $result = $flights->where('id',$id)->get();
            return view('buy')->with(['flight'=>$result->toArray()[0],'travelClass'=>$travelClass]);
        }else{
            return redirect('/login');
        }
    }
}
