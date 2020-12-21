<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guests;
use App\Tickets;
use App\Flights;
use Illuminate\Support\Facades\DB;
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
        $result  = CheckInController::searchDateForAccount($request);
        return view('ticket_account')->with(['result'=>$result]);
    }
    // 专门用户处理查询当前用户的票务信息
    protected function searchDateForAccount($request){
        $ticket = DB::select("select tickets.id,guests.guest_name,tickets.order_time,tickets.flight_id,flights.no,flights.from_city,flights.to_city,flights.date,flights.time,tickets.order_status from tickets left join guests on guests.id = tickets.guest_id left join flights on flights.id = tickets.flight_id where tickets.user_id = ? order by tickets.flight_id;",[$request->session()->get('loginID')]);
        $searchResult = [];
        foreach($ticket as $item){
            if(isset($searchResult[$item->flight_id])){
                array_push($searchResult[$item->flight_id]['guests_name'],$item->guest_name);
                array_push($searchResult[$item->flight_id]['ticket_id'],$item->id);
            }else{
                $searchResult[$item->flight_id] = [
                    'order_id'=>$item->id,
                    'ticket_id'=>[
                        $item->id
                    ],
                    'guests_name' => [
                        $item->guest_name
                    ],
                    'order_time'=>$item->order_time,
                    'flight_no'=>$item->no,
                    'from_city'=>$item->from_city,
                    'to_city'=>$item->to_city,
                    'date'=>$item->date,
                    'time'=>$item->time,
                    'order_status'=>$item->order_status
                ];
            }
        }
        return $searchResult;
    }
    public function selectSeat($ticketID){
        dd(json_decode($ticketID));
    }
}
