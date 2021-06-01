<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Dataset;
use App\Models\DataSummary;
use Carbon\Carbon;
use Symfony\Component\VarDumper\Cloner\Data;


class HomeController
{

    public function index(){

//        $new_data = new Dataset();
//        $new_data->humidity = rand(7, 30);
//        $new_data->save();


        $today_data = Dataset::whereDate('created_at', Carbon::today())
            ->pluck('humidity')->collect();

        $summary = DataSummary::whereDate('created_at', Carbon::today())
            ->first();

        if(!$summary){
            $summary = new DataSummary();
        }

        $arr['highest_humidity'] = $today_data->max();
        $arr['lowest_humidity'] = $today_data->min();
        $arr['average_humidity'] = $today_data->avg();
        $arr['total_collected'] = $today_data->count();

        $summary->collection = json_encode($arr);
        $summary->save();
        $data_summary = json_decode($summary->collection);

        $graph_collect = $today_data = Dataset::whereDate('created_at', Carbon::today())
            ->orderBy('id', 'DESC')
            ->limit(15)
            ->get()
            ->collect();

        $data = [];
        $categories = [];
        foreach ($graph_collect as $collect){
            $categories[] = Carbon::parse($collect->created_at)->format('h:i A');
            $data[] = $collect->humidity;
        }

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

        $weekly['date'] = $date;
        $weekly['avg'] = $avg_arr;
        $weekly['max'] = $max_arr;
        $weekly['min'] = $min_arr;

        return view('frontend.index', compact('data_summary', 'categories', 'data', 'weekly'));
    }
}
