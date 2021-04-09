<?php

use App\Http\Controllers\weatherController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group([
    'prefix' => 'weather',
], function () {
    Route::get('/', [weatherController::class, 'index'])->name('weather');
    Route::match(['post', 'get'],'city/{city?}', [weatherController::class, 'GetWeather'])->name('weatherByCity');
    Route::match(['post', 'get'],'zipcode/{zipcode?}', [weatherController::class, 'GetWeather'])->name('weatherByZipCode');
});

