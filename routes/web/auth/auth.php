<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::group([
    'prefix' => '',
    'as' => 'auth.',
], function () {

    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
