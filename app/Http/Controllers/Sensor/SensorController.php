<?php

namespace App\Http\Controllers\Sensor;

use App\Models\Dataset;
use App\Models\DataSummary;
use App\Models\Setting;
use App\Models\WaterSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client;

class SensorController
{
    public function newHumidityData (Request $request) {
        $new_data = new Dataset();
        $new_data->humidity = $request->input('humidity');
        $new_data->ph = $request->input('ph');
        $new_data->temperature = $request->input('temperature');
        $new_data->created_at = Carbon::createFromTimestamp($request->input('time'))->toDateTimeString();
        $new_data->updated_at = Carbon::createFromTimestamp($request->input('time'))->toDateTimeString();
        $new_data->save();
        updateLive($new_data->humidity, $new_data->ph, $new_data->temperature);
        updateSummary();
        Log::info($request->input('time'));
        Log::info(json_encode($new_data));
    }
}
