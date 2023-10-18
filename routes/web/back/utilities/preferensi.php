<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Utilities\PreferensiController;

Route::group([
    'prefix' => 'sys/utilities/preferensi',
    'as' => 'utilities.preferensi.',
    'middleware' => 'auth'
], function () {

    Route::get('', [PreferensiController::class, 'index'])->name('index');

    Route::post('simpan', [PreferensiController::class, 'simpan'])->name('simpan');

});
