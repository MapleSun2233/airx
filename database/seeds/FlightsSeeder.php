<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Flights;
class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = DB::table('cities')->get();
        $type = ['A320',"300ER"];
        for ($i = 0; $i < 5; $i++){
            for ($k = 0; $k <= 100; $k ++){
                $from_city = $cities[rand(0,5)];
                $to_city = $cities[rand(0,5)];
                if ($from_city == $to_city){
                    continue;
                }
                $no = "NO.JG".rand(1,10).rand(0,10).rand(0,100);
                $flight_type = $type[rand(0,1)];
//                生成几天后的时间
                $date = date("Y-m-d",strtotime("+{$i} day"));
                $time = date(rand(0,23).":".rand(0,59));
                Flights::create([
                    "no" => $no,
                    "type" => $flight_type,
                    "from_city" => $from_city->city_name,
                    "to_city" => $to_city->city_name,
                    "date" => $date,
                    "time" => $time,
                    "first_total" => 8,
                    "business_total" => $flight_type === "A320" ? 0 : 42,
                    "economic_total" => $flight_type === "A320" ? 150 : 264
                ]);
            }
        }
    }
}
