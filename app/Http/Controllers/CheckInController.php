<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Guests;
use App\Tickets;
use App\Flights;
use Illuminate\Support\Facades\DB;
use App\Filenames;

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
    // 提供选座数据
    public function selectSeat($ticketID){
        $tickets = json_decode($ticketID);
        $guests = [];
        $ticket = Tickets::where('id',$tickets[0])->get()->toArray()[0];
        $flightID = $ticket['flight_id'];
        $flight  = Flights::where('id',$flightID)->get()->toArray()[0];
        $flight['class_type'] = $ticket['class_type'];
        foreach($tickets as $ticket){
            $guest = Guests::where('id',Tickets::where('id',$ticket)->get()->toArray()[0]['guest_id'])->get()->toArray()[0]['guest_name'];
            array_push($guests,$guest);
        }
        return view('select_seat')->with(['guests'=>$guests,'flight'=>$flight,'tickets'=>$tickets]);
    }
    // 处理选座结果
    public function dealSelectResult(Request $request){
        $setedID = [];
        $selectData = json_decode($request->getContent());
        foreach($selectData as $item){
            $ticket = Tickets::find($item[0]);
            $ticket->seat_num = $item[1];
            $ticket->order_status = 'check-in';
            $ticket->save();
            array_push($setedID,$item[0]);
        }
        return response()->json($setedID);
    }
    public function seatResult($ticketID){
        $ticketId = json_decode($ticketID);
        $ticketsInfo = [];
        $no = null;
        $userInfo  = [];
        $time = null;
        $date = null;
        foreach($ticketId as $id)
            array_push($ticketsInfo,Tickets::where('id',$id)->get()->toArray()[0]);
        // 拿到航班信息
        $flightInfo = Flights::where('id',$ticketsInfo[0]['flight_id'])->get()->toArray()[0];
        $no = $flightInfo['no'];
        $time = $flightInfo['time'];
        $date = $flightInfo['date'];
        foreach($ticketsInfo as $ticket){
            $name = Guests::where('id',$ticket['guest_id'])->get()->toArray()[0]['guest_name'];
            $seat = $ticket['seat_num'];
            array_push($userInfo,[$name,$seat]);
        }

        // 生成文件内容
        $text = "Your check in of flight ".$no." is successfully scheduled.\n\nYour seat arrangement is listed below:\n\n";
        foreach($userInfo as $guest){
            $text .= "\t".$guest[0].", Seat:".$guest[1]."\n";
        }
        $text .= "\nYour flight will take off at ".$time." ".$date.". Please be prepared for boarding.\nThank you for choosing our flights.";
        // 生成唯一的文件名
        $filename = "seatInfo".mt_rand(0,1000);
        while(Filenames::where('filename')->get()->toArray())
            $filename = "seatInfo".mt_rand(0,9999999);
        // 生成文件并存入数据库
        Storage::disk('public')->put($filename.'.txt',$text);
        $dbfile = new Filenames();
        $dbfile->filename = $filename;
        $dbfile->save();

        return view('seat_result')->with([
            'userInfo'=>$userInfo,
            'no'=>$no,
            'time'=>$time,
            'date'=>$date,
            'filename'=>$filename
            ]);
    }
}
