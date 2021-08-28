<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Http\Requests\Backend\Water\ChangeRequest;
use App\Http\Requests\Backend\Water\CreateRequest;
use App\Http\Requests\Water\InsertRequest;
use App\Models\Dataset;
use App\Models\DataSummary;
use App\Models\Setting;
use App\Models\WaterSchedule;
use App\Models\WaterUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class WaterController
{

    public function index(){

        $day = 0;
        do{
            $date = Carbon::today()->addDays(-$day);
            $sum = WaterUsage::whereDate('created_at', $date)->sum('litre');
            $data[] = [
                0 => $date->format('d M'),
                1 => $sum
            ];
            $day++;
        }while($day <= 7);


        $schedules = WaterSchedule::where('executed', 0)->get();


        return view('backend.water.index', compact('data', 'schedules'));
    }

    public function valveSwitch(){

        $setting = Setting::where('name', 'pipe')
            ->first();

        $live = getLive();

        $usage = WaterUsage::orderBy('id', 'DESC')->first();
        return view('backend.water.valve-switch', compact('setting', 'live', 'usage'));
    }

    public function valveChange(ChangeRequest $request){

        $setting = Setting::where('name', 'pipe')
            ->first();

        if($request->status == $setting->value) {
            return redirect()->back()->withErrors("Valve status already $setting->value");
        }

        if($request->status == 'on'){
            #new water usage
            $water = new WaterUsage();
            $water->user_id = auth()->user()->id;
            $water->start = Carbon::now();
            $water->save();

            $setting->value = $request->status;
            $setting->save();

            return redirect()->back()->withFlashSuccess("Valve successfully turned on.");

        }else{
            #update water usage


            $water = WaterUsage::orderBy('id', 'DESC')
                ->first();
            $water->end = Carbon::now();

            $start = Carbon::parse($water->start);
            $end = Carbon::parse($water->end);
            $diff = $end->diff($start);
            $hours = ($diff->days*24)+$diff->h;
            $water->total = "$hours:$diff->i:$diff->s";
            $water->litre = calculateUsage($water->start, $water->end);
            $water->save();

            $setting->value = $request->status;
            $setting->save();

            $reformatTime = reformatTime($water->total);

            return redirect()->back()->withFlashSuccess("Turned off. Usage: $water->litre L of water for $reformatTime");
        }
    }

    public function create(){

        return view('backend.water.create');
    }

    public function store(InsertRequest $request){

        $schedule         = new WaterSchedule();
        $schedule->date   = Carbon::parse($request->date);
        $schedule->time   = Carbon::parse($request->time);
        $schedule->save();

        return redirect()->route('admin.water.index')->withFlashSuccess("Data inserted!");
    }

    public function edit($id){

        $schedule = WaterSchedule::findOrFail($id);
        return view('backend.water.edit', compact('schedule'));
    }

    public function update(InsertRequest $request, $id){


        $schedule         = WaterSchedule::where('executed', 0)->findOrFail($id);
        $schedule->date   = Carbon::parse($request->date);
        $schedule->time  = Carbon::parse($request->time);
        $schedule->save();

        return redirect()->back()->withInput()->withFlashSuccess("Data updated!");
    }

    public function delete($id){

        $schedule         = WaterSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->withFlashSuccess("Data deleted!");

    }
}
