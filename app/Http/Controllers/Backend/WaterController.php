<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Http\Requests\Backend\Water\ChangeRequest;
use App\Models\Dataset;
use App\Models\DataSummary;
use App\Models\Setting;
use App\Models\WaterUsage;
use Carbon\Carbon;

/**
 * Class DashboardController.
 */
class WaterController
{

    public function index(){

        $water = WaterUsage::whereDate('created_at', Carbon::today())
            ->get();

        return view('backend.water.index', compact('water'));
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
}
