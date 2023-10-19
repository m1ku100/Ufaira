<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\TourController;

Route::group([
    'prefix' => 'sys/master/tour',
    'middleware' => 'auth',
    'as' => 'master.tour.'
], function () {

    Route::get('', [TourController::class, 'index'])->name('index');

    Route::post('simpan', [TourController::class, 'simpan'])->name('simpan');

    Route::post('hapus', [TourController::class, 'hapus'])->name('hapus');

    Route::post('pulihkan', [TourController::class, 'pulihkan'])->name('pulihkan');

    Route::post('hapus-permanen', [TourController::class, 'hapusPermanent'])->name('hapus.permanen');

    Route::post('daftar-role', [TourController::class, 'daftarRole'])->name('daftar.role');

    // Detail Goes Here




    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [TourController::class, 'tableData'])->name('table');


    });

});
