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
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client;

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


        $schedules = WaterSchedule::
            where('executed', 0)
            ->where('execution', '>', Carbon::now()->timestamp)
            ->orderBy('execution', 'ASC')
            ->get();


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
            $this->togglePump('on');
            return redirect()->back()->withFlashSuccess("Valve successfully turned on.");

        }else{
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
            $this->togglePump('off');
            return redirect()->back()->withFlashSuccess("Turned off. Usage: $water->litre L of water for $reformatTime");
        }
    }

    private function togglePump ($action) {
        try {
            $client = new Client(['base_uri' => \config('pi.url')]);
            $headers = ['PI-KEY' => \config('pi.key')];
            $request = new GuzzleRequest('GET', sprintf('/api/smart/pump/%s', $action), $headers);
            $promise = $client->sendAsync($request);
            $promise->then(
                function ($res) use (&$promise) {
                    Log::info($res->getBody());
                    $promise->resolve($res);
                },
                function (RequestException $e) use (&$promise) {
                    $promise->reject($e);
                }
            );
            return $promise->wait();
        } catch (\Exception $exception) {
            Log::info(json_encode($exception));
        }
    }

    public function create(){
        return view('backend.water.create');
    }

    public function convertDateTime ($date, $time) {
        $datetime = sprintf('%s %s', $date, $time);
        return Carbon::createFromFormat('Y-m-d H:i', $datetime)->timestamp;
    }

    public function store(InsertRequest $request){
        $schedule = new WaterSchedule();
        $schedule->execution = $this->convertDateTime($request->date, $request->time);
        $schedule->save();
        return redirect()->route('admin.water.index')->withFlashSuccess("Data inserted!");
    }

    public function edit($id){
        $schedule = WaterSchedule::findOrFail($id);
        return view('backend.water.edit', compact('schedule'));
    }

    public function update(InsertRequest $request, $id){
        $schedule = WaterSchedule::where('executed', 0)->findOrFail($id);
        $schedule->execution = $this->convertDateTime($request->date, $request->time);
        $schedule->save();
        return redirect()->back()->withInput()->withFlashSuccess("Data updated!");
    }

    public function delete($id){
        $schedule = WaterSchedule::findOrFail($id);
        $schedule->delete();
        return redirect()->back()->withFlashSuccess("Data deleted!");

    }
}
