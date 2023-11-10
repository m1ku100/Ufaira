<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\BannerController;

Route::group([
    'prefix' => 'sys/profile/banner',
    'middleware' => 'auth',
    'as' => 'profile.banner.'
], function () {

    Route::get('', [BannerController::class, 'index'])->name('index');

    Route::post('simpan', [BannerController::class, 'simpan'])->name('simpan');

    Route::post('edit', [BannerController::class, 'edit'])->name('edit');

    Route::post('hapus', [BannerController::class, 'hapus'])->name('hapus');

    Route::post('get', [BannerController::class, 'getData'])->name('get.data');


    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [BannerController::class, 'tableData'])->name('table');

        Route::get('select', [BannerController::class, 'selectData'])->name('select');

    });
});
