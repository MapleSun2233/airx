<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Flights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouterController extends Controller
{
    //
    public function index(){
        $result  = DB::table('cities')->get();
        return view('index',['cities'=> $result]);
    }
    public function store(Request $request){
        $result  = DB::table('cities')->get();
        if($request->isMethod('get')){
            $flights = Flights::where('time','>',date("H:i:s",strtotime("+1 hours")))
                ->where('date','>=',date("Y-m-d"))
                ->orderBy('date','asc')
                ->orderBy('time','asc')
                ->get();
            return view('search',['cities'=>$result,'flights'=>$flights]);
        }else{
            $flights = Flights::orderBy('date','asc')->orderBy('time','asc')->get();
            if($request->from != 'Any city')
                $flights = $flights->where('from_city',$request->from);
            if($request->to != 'Select a city')
                $flights = $flights->where('to_city',$request->to);
            if($request->date != null)
                $flights = $flights->where('time','>',date("H:i:s",strtotime("+1 hours")))
                    ->where('date',$request->date);
            return view('search',['cities'=>$result,
                'from'=>$request->from,
                'to'=>$request->to,
                'date'=>$request->date,
                'class'=>$request->class,
                'flights'=>$flights]);
        }
    }
    public function download(Request $request,$filename){
        return Storage::download("public/".$filename.'.txt');
    }
}
