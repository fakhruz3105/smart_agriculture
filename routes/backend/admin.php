<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\WaterController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::group([
    'as' => 'water.',
    'prefix' => 'water/'
], function (){
    Route::get('', [WaterController::class, 'index'])->name('index');
    Route::get('valve-switch', [WaterController::class, 'valveSwitch'])->name('valve-switch');
    Route::post('valve-switch', [WaterController::class, 'valveChange'])->name('valve-change');
});
