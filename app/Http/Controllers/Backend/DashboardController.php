<?php

namespace App\Http\Controllers\Backend;

use App\Models\Dataset;
use App\Models\DataSummary;
use Carbon\Carbon;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $summary = DataSummary::whereDate('created_at', Carbon::today())
            ->first();

        if(!$summary){
            updateSummary();
            $summary = DataSummary::whereDate('created_at', Carbon::today())
                ->first();
        }

        $data_summary = json_decode($summary->collection);

        $graph_collect = $today_data = Dataset::whereDate('created_at', Carbon::today())
            ->orderBy('id', 'DESC')
            ->limit(15)
            ->get()
            ->collect();

        $humidity = [];
        $ph = [];
        $categories = [];
        foreach ($graph_collect as $collect){
            $categories[] = Carbon::parse($collect->created_at)->format('h:i A');
            $humidity[] = $collect->humidity;
            $ph[] = $collect->ph;
            $temperature[] = $collect->ph;
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

                $avg_humidity = $decode->humidity->average;
                $avg_temperature = $decode->temperature->average;
                $avg_ph = $decode->ph->average;
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

        return view('backend.dashboard', compact('data_summary', 'categories', 'area', 'weekly', 'summary'));
    }
}
