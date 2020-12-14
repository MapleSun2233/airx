<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Flights;
use App\Guests;
use App\Orders;
use App\Tickets;
use App\Filenames;
class TicketController extends Controller
{
    //
    public function buy($id,$travelClass,Request $request){
        $flights = new Flights();
        $result = $flights->where('id',$id)->get();
        $loginID = $request->session()->get('loginID');
        $guests = Guests::where('user_id',$loginID)->get()->toArray();
        return view('buy')->with([
            'flight'=>$result->toArray()[0],
            'travelClass'=>$travelClass,
            'guests'=>$guests
            ]);
    }
    public function dealBuyInfo(Request $request){
        // 获取到提交上来的数据数组
        $orderedGuestsIds = $request->guests;
        $newNames = $request->name;
        $newPhones = $request->phone;
        $newGenders = $request->gender;
        $newCards = $request->id;
        $user_id = $request->session()->get('loginID');
        // 防止没有新用户
        if($newNames)
        for($i = 0 ; $i < count($newNames) ; $i++){
            // 防止新键用户与已有用户重复
            if(Guests::where('guest_card',$newCards[$i])->get())
                continue; 
            // 增加乘客信息
            $guests = new Guests();
            $guests->user_id = $user_id;
            $guests->guest_name = $newNames[$i];
            $guests->guest_phone = $newPhones[$i];
            $guests->guest_gender = $newGenders[$i];
            $guests->guest_card = $newCards[$i];
            $guests->save();
            $id = $guests->id;
            array_push($orderedGuestsIds,$id);
        }
        //处理订票信息
        $flightID = $request->flight_id;
        $travelClass = $request->travel_class;
        
        // 拿到航班信息
        $flightInfo = Flights::where('id',$flightID)->get()->toArray()[0];
        $no = $flightInfo['no'];
        $takeOffDate = $flightInfo['date'];
        $takeOffTime = $flightInfo['time'];
        
        // 拿到乘客信息
        $orderedGuestsInfo = [];
        foreach($orderedGuestsIds as $itemKey){
            $guest = Guests::where('id',$itemKey)->get()->toArray()[0];
            array_push($orderedGuestsInfo,[
                'guest_name'=>$guest['guest_name'],
                'guest_id'=>$guest['guest_card']
            ]);
        }
        // 存入数据库
        for($i = 0 ; $i < count($orderedGuestsIds); $i++){
            $tickets = new Tickets();
            $tickets->user_id = $user_id;
            $tickets->guest_id = $orderedGuestsIds[$i];
            $tickets->class_type = $travelClass;
            $tickets->order_time = date("Y-m-d H:i:s");
            $tickets->flight_id = $flightID;
            $tickets->save();
        }
        // 生成文件内容
        $text = "Your ticket(s) of flight UB4874 have been successfully purchased.\n\nThis order contains following contents:".count($orderedGuestsInfo)." AIRX flight ticket(s) of flight ".$no." (".$travelClass.").\n\nThe guests are:\n\n";
        foreach($orderedGuestsInfo as $guest){
            $text .= "\t".$guest['guest_name'].", ID Card:".$guest['guest_id']."\n";
        }
        $text .= "\nYour flight will take off at ".$takeOffTime." ".$takeOffDate.". Please get ready for boarding.\nThank you for choosing our flights.";
        // 生成唯一的文件名
        $filename = "ticketInfo".mt_rand(0,1000);
        while(Filenames::where('filename')->get()->toArray())
            $filename = "ticketInfo".mt_rand(0,9999999);
        // 生成文件并存入数据库
        Storage::disk('public')->put($filename.'.txt',$text);
        $dbfile = new Filenames();
        $dbfile->filename = $filename;
        $dbfile->save();
        // 显示结果
        return view('result')->with([
            'no'=>$no,
            'travelClass'=>$travelClass,
            'takeOffDate'=>$takeOffDate,
            'takeOffTime'=>$takeOffTime,
            'orderedGuestInfo'=>$orderedGuestsInfo,
            'filename'=>$filename
        ]);
    }
}
