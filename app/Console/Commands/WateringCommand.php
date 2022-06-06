<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\WaterSchedule;

class WateringCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:pump {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $id = $this->argument('id');
            $client = new Client(['base_uri' => \config('pi.url')]);
            $headers = ['PI-KEY' => \config('pi.key')];
            $request = new GuzzleRequest('POST', '/api/smart/pump', $headers);
            $promise = $client->sendAsync($request);
            $promise->then(
                function ($res) use (&$promise) {
                    $schd = WaterSchedule::where('id', $id);
                    $schd->executed = true;
                    $schd->save();
                    $promise->resolve($res);
                },
                function (RequestException $e) use (&$promise) {
                    $promise->reject($e);
                }
            );
            $response = $promise->wait();
        } catch (\Exception $exception) {
            Log::info(json_encode($exception));
        }
    }
}
