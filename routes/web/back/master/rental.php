<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\RentalController;

Route::group([
    'prefix' => 'sys/master/rental',
    'middleware' => 'auth',
    'as' => 'master.rental.'
], function () {

    Route::get('', [RentalController::class, 'index'])->name('index');

    Route::post('simpan', [RentalController::class, 'simpan'])->name('simpan');

    Route::post('hapus', [RentalController::class, 'hapus'])->name('hapus');

    Route::post('pulihkan', [RentalController::class, 'pulihkan'])->name('pulihkan');

    Route::post('hapus-permanen', [RentalController::class, 'hapusPermanent'])->name('hapus.permanen');

    Route::post('daftar-role', [RentalController::class, 'daftarRole'])->name('daftar.role');


    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [RentalController::class, 'tableData'])->name('table');


    });

});
