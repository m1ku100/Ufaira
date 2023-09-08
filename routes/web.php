<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [FrontController::class, 'index'])->name('index');

Route::get('/bromo', [FrontController::class, 'tripBromo'])->name('bromo');

Route::get('/kawah-ijen', [FrontController::class, 'tripIjen'])->name('ijen');

Route::get('/galeri', [FrontController::class, 'gallery'])->name('gallery');

Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');

Route::get('/kontak-kami', [FrontController::class, 'contact'])->name('contact');
