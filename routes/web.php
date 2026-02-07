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

Route::get('/', function () {
    return redirect('/' . config('app.locale'));
});

Route::get('/switch-language', function () {

    $current = app()->getLocale();
    $target = $current === 'id' ? 'en' : 'id';

    session(['locale' => $target]);

    // redirect ke halaman sebelumnya tapi ganti locale
    $previous = url()->previous();
    $parsed = parse_url($previous);

    $path = $parsed['path'] ?? '/';
    $segments = explode('/', trim($path, '/'));

    // replace locale segment
    if (in_array($segments[0] ?? '', ['id', 'en'])) {
        $segments[0] = $target;
    } else {
        array_unshift($segments, $target);
    }

    return redirect('/' . implode('/', $segments));
})->name('switch.language');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'id|en']
], function () {

    Route::get('/', [FrontController::class, 'index'])->name('index');

    Route::get('/trip/{slug}', [FrontController::class, 'trip'])->name('trip');

    Route::get('/bromo', [FrontController::class, 'tripBromo'])->name('bromo');

    Route::get('/bromo-ijen', [FrontController::class, 'tripIjen'])->name('ijen');

    Route::get('/rental', [FrontController::class, 'rental'])->name('rental');

    Route::get('/galeri', [FrontController::class, 'gallery'])->name('gallery');

    Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');

    Route::get('/kontak-kami', [FrontController::class, 'contact'])->name('contact');

});
