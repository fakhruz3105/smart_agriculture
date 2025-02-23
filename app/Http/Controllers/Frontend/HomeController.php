<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Dataset;
use App\Models\DataSummary;
use App\Models\Setting;
use App\Models\WaterSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController
{

    public function index(){

//        $today_data = Dataset::whereDate('created_at', Carbon::today())
//            ->pluck('humidity')->collect();

        $summary = DataSummary::whereDate('created_at', Carbon::today())
            ->first();

        if(!$summary){
            updateSummary();
            $summary = DataSummary::whereDate('created_at', Carbon::today())
                ->first();
        }

        $data_summary = json_decode($summary->collection);

        $graph_collect = $today_data = Dataset::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'DESC')
            ->limit(15)
            ->get()
            ->collect();

        $temperature = [];
        $humidity = [];
        $ph = [];
        $categories = [];
        foreach ($graph_collect as $collect){
            $categories[] = Carbon::parse($collect->created_at)->timestamp;
            $humidity[] = round($collect->humidity, 2);
            $ph[] = round($collect->ph, 2);
            $temperature[] = round($collect->temperature, 2);
        }

        $area = [
            'humidity' => $humidity,
            'ph' => $ph,
            'temperature' => $temperature
        ];

        $this_week = Carbon::today()->addDays('-7');
        $day = 1;
        $date = [];
        do{
            $current_day = $this_week->addDay();

            $date[] = $current_day->format('l');

            $prev_summary = DataSummary::whereDate('created_at', $current_day)->first();
            $avg_humidity = $avg_temperature = $avg_ph = 0;

            if($prev_summary){
                $decode = json_decode($prev_summary->collection);

                $avg_humidity = round($decode->humidity->average, 2);
                $avg_temperature = round($decode->temperature->average, 2);
                $avg_ph = round($decode->ph->average, 2);
            }

            $arr_h[] = $avg_humidity;
            $arr_t[] = $avg_temperature;
            $arr_p[] = $avg_ph;
            $day++;
        }while($day<=7);

        $weekly['date'] = $date;
        $weekly['humidity'] = $arr_h;
        $weekly['temperature'] = $arr_t;
        $weekly['ph'] = $arr_p;

        $weekly['date'][6] = $current_day->format('l')." (Today)";

        return view('frontend.index', compact('data_summary', 'categories', 'area', 'weekly', 'summary'));
    }

    public function insert(){
        Log::info('Called');
        for ($x = 0; $x <= 20; $x++) {
            $new_data = new Dataset();
            $new_data->humidity = rand(7, 30);
            $new_data->ph = rand(3.1, 8.9);
            $new_data->temperature = rand(18.1, 38.9);
            $new_data->save();
            updateLive($new_data->humidity, $new_data->ph, $new_data->temperature);
        }

        return redirect()->back()->withFlashSuccess('New data inserted.');
    }

    public function pi3(Request $request){

        $key = env('PI_KEY', \config('pi.key'));

        // if($request->key != $key){
        //     return response()->json(['status' => 'error', 'message' => 'Invalid PI key!']);
        // }

        $new_data = new Dataset();
        $new_data->humidity = $request->humidity;
        $new_data->ph = $request->ph;
        $new_data->temperature = $request->temperature;
        $new_data->save();

        updateLive($new_data->humidity, $new_data->ph, $new_data->temperature);
        return response()->json(['status' => 'success', 'message' =>'Data inserted']);
    }

    public function pi3Valve(Request $request){

        $key = env('PI_KEY', \config('pi.key'));

        if($request->key != $key){
            return response()->json(['status' => 'error', 'message' => 'Invalid PI key!']);
        }

        $setting = Setting::where('name', 'pipe')->first();

//        return $setting->value;
        return response()->json(['data' => $setting->value]);
    }

    public function waterSchedule(Request $request){

        $key = env('PI_KEY', \config('pi.key'));

        if($request->key != $key){
            return response()->json(['status' => 'error', 'message' => 'Invalid PI key!']);
        }

        $schedule = WaterSchedule::whereDate('date', Carbon::today())
//            ->whereDate('time', '>', Carbon::now()->format('h:i:s'))
            ->where('executed', 0)
            ->first();

        if($schedule){

            $datetime = Carbon::parse($schedule->date." ".$schedule->time);
            if($datetime <= Carbon::now()){
                $schedule->update(['executed' => 1]);
                return response()->json(['data' => true]);
            }
        }

        return response()->json(['data' => false]);
    }

    public function updateSummary(){

        $today_data = Dataset::whereDate('created_at', Carbon::today())->get()->collect();

        $summary = DataSummary::whereDate('created_at', Carbon::today())
            ->first();

        if(!$summary){
            updateSummary();
            $summary = DataSummary::whereDate('created_at', Carbon::today())
                ->first();
        }

        $humidity = $today_data->pluck('humidity');
        $temperature = $today_data->pluck('temperature');
        $ph = $today_data->pluck('ph');

        $data['total']   = $today_data->count();
        $data['humidity'] = [
            'highest' => $humidity->max(),
            'lowest'  => $humidity->min(),
            'average' => $humidity->avg(),
        ];
        $data['temperature'] = [
            'highest' => $temperature->max(),
            'lowest'  => $temperature->min(),
            'average' => $temperature->avg(),
        ];

        $data['ph'] = [
            'highest' => $ph->max(),
            'lowest'  => $ph->min(),
            'average' => $ph->avg(),
        ];

        $summary->collection = json_encode($data);
        $summary->save();

        return response()->json(['success', 'message' => 'Summary data updated!']);
    }

    public function old(){

        $this_week = Carbon::today()->addDays('-7');
        $day = 1;
        $date = [];
        $avg_arr = $max_arr = $min_arr = [];
        do{
            $current_day = $this_week->addDay();

            $date[] = $current_day->format('l');
            $prev_summary = DataSummary::whereDate('created_at', $current_day)->first();
            $avg = $max = $min = 0;
            if($prev_summary){
                $decode = json_decode($prev_summary->collection);

                $avg = $decode->average_humidity;
                $max = $decode->highest_humidity;
                $min = $decode->lowest_humidity;
            }
            $avg_arr[] = (int)$avg;
            $max_arr[] = (int)$max;
            $min_arr[] = (int)$min;
            $day++;
        }while($day<=7);


        dd('ok');
    }
}
