<?php

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
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/container-list', function () {
    return view('pages.container');
})->name('container.list');

Route::get('/investor-list', function () {
    return view('pages.investor');
})->name('investor.list');

Route::get('/shipment-list', function () {
    return view('pages.shipment');
})->name('shipment.list');
