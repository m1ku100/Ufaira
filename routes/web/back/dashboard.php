<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;

Route::group([
    'prefix' => 'sys',
    'middleware' => 'auth'
], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::group([
//        'prefix' => 'data',
//        'as' => 'dashboard.data.'
//    ], function () {
//
//        Route::post('graph/selling', [DashboardController::class, 'getGraphSelling'])->name('graph.selling');
//
//        Route::post('graph/treatment', [DashboardController::class, 'getGraphTreatment'])->name('graph.treatment');
//
//        Route::post('graph/member', [DashboardController::class, 'getGraphNewMember'])->name('graph.member');
//
//    });

});
