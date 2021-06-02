<?php

use App\Models\Dataset;
use App\Models\DataSummary;
use Carbon\Carbon;

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
