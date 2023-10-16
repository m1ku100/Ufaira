<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\UserController;

Route::group([
    'prefix' => 'sys/master/pengguna',
    'middleware' => 'auth',
    'as' => 'master.pengguna.'
], function () {

    Route::get('', [UserController::class, 'index'])->name('index');

    Route::post('simpan', [UserController::class, 'simpan'])->name('simpan');

    Route::post('hapus', [UserController::class, 'hapus'])->name('hapus');

    Route::post('pulihkan', [UserController::class, 'pulihkan'])->name('pulihkan');

    Route::post('hapus-permanen', [UserController::class, 'hapusPermanent'])->name('hapus.permanen');

    Route::post('daftar-role', [UserController::class, 'daftarRole'])->name('daftar.role');


    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [UserController::class, 'tableData'])->name('table');

        Route::post('select', [UserController::class, 'selectData'])->name('select');

        Route::post('menu', [UserController::class, 'getDaftarMenu'])->name('daftar.menu');

        Route::post('akses', [UserController::class, 'getDaftarMenuAkses'])->name('daftar.menu.akses');

    });

});
