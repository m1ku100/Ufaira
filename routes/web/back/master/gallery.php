<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\GalleryController;

Route::group([
    'prefix' => 'sys/profile/gallery',
    'middleware' => 'auth',
    'as' => 'profile.gallery.'
], function () {

    Route::get('', [GalleryController::class, 'index'])->name('index');

    Route::post('simpan', [GalleryController::class, 'simpan'])->name('simpan');

    Route::post('hapus', [GalleryController::class, 'hapus'])->name('hapus');

    Route::post('get', [GalleryController::class, 'getData'])->name('get.data');


    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [GalleryController::class, 'tableData'])->name('table');

        Route::get('select', [GalleryController::class, 'selectData'])->name('select');

    });
});
