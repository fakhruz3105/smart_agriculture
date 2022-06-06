<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class WaterSchedule extends Model
{
//    protected $table = 'water_usages';

    protected $fillable = ['executed'];

    public function execute () {
        try {
            $client = new Client(['base_uri' => \config('pi.url')]);

            $headers = ['PI-KEY' => \config('pi.key')];
            $request = new Request('POST', '/api/smart/pump', $headers);
            $promise = $client->sendAsync($request);
            $promise->then(
                function ($res) use (&$promise) {
                    Log::info($res->getBody());
                    $data = json_decode($res->getBody());
                    $this->executed = true;
                    $this->save();
                },
                function (RequestException $e) use (&$promise) {
                    $promise->reject($e);
                }
            );
            $promise->wait();
        } catch (\Exception $exception) {
            Log::info(json_encode($exception));
        }
    }
}
