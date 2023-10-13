<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Master\RoleController;

Route::group([
    'prefix' => 'sys/master/role',
    'middleware' => 'auth',
    'as' => 'master.role.'
], function () {

    Route::get('', [RoleController::class, 'index'])->name('index');

    Route::post('simpan', [RoleController::class, 'simpanRole'])->name('simpan.role');

    Route::post('simpan-akses', [RoleController::class, 'simpanAksesMenu'])->name('simpan.akses');

    Route::post('hapus', [RoleController::class, 'hapus'])->name('hapus');



    Route::group([
        'prefix' => 'data',
        'as' => 'data.'
    ], function (){

        Route::post('table', [RoleController::class, 'tableData'])->name('table');

        Route::get('select', [RoleController::class, 'selectData'])->name('select');

        Route::post('menu', [RoleController::class, 'getDaftarMenu'])->name('daftar.menu');

        Route::post('akses', [RoleController::class, 'getDaftarMenuAkses'])->name('daftar.menu.akses');

    });

});
