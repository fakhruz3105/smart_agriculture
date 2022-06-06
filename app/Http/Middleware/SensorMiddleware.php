<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class EncryptCookies.
 */
class SensorMiddleware extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function verifySecretKey(Request $request) {
        Log::info('Verify later');
    }
}
