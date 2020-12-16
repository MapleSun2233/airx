<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guests;
use App\Tickets;
use App\Flights;
class CheckInController extends Controller
{
    //
    public function show(){
        return view('check_in');
    }
    public function showByID(Request $request){
        $idCard  = $request->idCard;
        $phone = $request->phone;
        $guest = Guests::where('guest_phone',$phone)->where('guest_card',$idCard)->get()->toArray();
        $result = [];
        if($guest){
            $ticketsInfo = Tickets::where('guest_id',$guest[0]['id'])->get()->toArray();
            if($ticketsInfo){
                foreach($ticketsInfo as $ticket){
                    $flightInfo = Flights::where('id',$ticket['flight_id'])->get()->toArray()[0];
                    array_push($result,[
                        'ticket_id'=>$ticket['id'],
                        'order_time'=>$ticket['order_time'],
                        'from_city'=>$flightInfo['from_city'],
                        'to_city'=>$flightInfo['to_city'],
                        'no'=>$flightInfo['no'],
                        'departure_date'=>$flightInfo['date'],
                        'departure_time'=>$flightInfo['time'],
                        'ticket_status'=>$ticket['order_status']
                    ]);
                }
            }
        }
        else
            return redirect('/check_in')->with('message','ID Card or Phone error');
        return view('ticket_guest')->with(['guest_name'=>$guest[0]['guest_name'],'result'=>$result]);
    }
    public function showByAccount(Request $request){
        $result  = Tickets::where('user_id',$request->session()->get('loginID'))->get()->toArray();
        dd($result);
        return view('ticket_account');
    }
}
