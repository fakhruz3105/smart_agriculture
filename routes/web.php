<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

Route::get('api/send-data', [HomeController::class, 'insert'])->name('api.send');

Route::get('cron/summary', [HomeController::class, 'updateSummary'])->name('cron.update');

Route::get('api/pi3-insert',[HomeController::class, 'pi3'])->name('api.send');
Route::get('api/pi3-valve',[HomeController::class, 'pi3Valve'])->name('api.valve');
Route::get('api/water',[HomeController::class, 'waterSchedule'])->name('api.water');

Route::get('time',function (){
    echo "The time is " . date("h:i:s a");
})->name('api.water');



