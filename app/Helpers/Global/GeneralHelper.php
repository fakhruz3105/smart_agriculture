<?php

use App\Models\Dataset;
use App\Models\DataSummary;
use App\Models\Setting;
use Carbon\Carbon;
use App\Models\LiveData;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     *
     * @return Carbon
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if(!function_exists('humidityFormat')){

    function humidityFormat($data){
        return round($data, 2). " %";
    }
}

if(!function_exists('temperatureFormat')){

    function temperatureFormat($data){
        return round($data, 2). " °C";
    }
}

if(!function_exists('phFormat')){

    function phFormat($data){
        return round($data, 2). "";
    }
}

if(!function_exists('litreFormat')){

    function litreFormat($data){
        return round($data, 2). " L";
    }
}

if(!function_exists('detetimeFormat')){

    function detetimeFormat($date, $format = 'h:i:s A, d-m-Y'){
        return Carbon::parse($date)->format($format);
    }
}

if(!function_exists('updateSummary')){

    function updateSummary(){

        $today_data = Dataset::whereDate('created_at', Carbon::today())->get()->collect();

        $summary = DataSummary::whereDate('created_at', Carbon::today())
            ->first();

        if(!$summary){
            $summary = new DataSummary();
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
    }
}

if(!function_exists('litrePerminute')){

    function litrePerminute(){
        return 3;
    }
}

if(!function_exists('calculateUsage')){

    function calculateUsage($start, $end){

        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        $diff = $end->diffInMinutes($start);
        $perlitre = litrePerminute();

        return $diff*$perlitre;

    }
}

if(!function_exists('getValveStatus')){

    function getValveStatus(){

        $setting = Setting::where('name', 'pipe')
            ->first();

        return $setting->value;
    }
}


if(!function_exists('reformatTime')){

    function reformatTime($time){

        $pieces = explode(":", $time);

        if(count($pieces) != 3){
            return __('Invalid Time');
        }
        if($pieces[0] == 0){
            return (int)$pieces[1]." mins";
        }

        return (int)$pieces[0]." hours ".(int)$pieces[1]." mins";
    }
}

if(!function_exists('updateLive')){

    function updateLive($humidity, $ph, $temperature){

        $live = LiveData::find(1);

        $live->humidity = $humidity;
        $live->ph = $ph;
        $live->temperature = $temperature;
        $live->save();

        return true;
    }
}


if(!function_exists('getLive')){

    function getLive(){

        $live = LiveData::find(1);
        return $live;
    }
}

if(!function_exists('reformatDateTime')){
    function reformatDateTime($datetime, $format = "d-m-Y H:i:s"){
        return Carbon::parse($datetime)->format($format);
    }
}

if(!function_exists('reformatTimestamp')){
    function reformatTimestamp($datetime, $format = "d-m-Y H:i:s"){
        return Carbon::createFromTimestamp($datetime)->format($format);
    }
}

if(!function_exists('getDiffTime')){
    function getDiffTime($start, $end){

        $start = Carbon::parse($start);
        $end   = Carbon::parse($end);

        $diff = $start->diff($end);

        return $diff->h." hours ".$diff->i." minutes";
    }
}
