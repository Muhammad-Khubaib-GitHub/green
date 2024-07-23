<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ShipmentController;

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

Route::get('/', [UserController::class, 'home']);
Route::get('/investor/list', [UserController::class, 'userList'])->name('investor.list');
Route::get('/container/list', [ContainerController::class, 'containerList'])->name('container.list');
Route::get('/shipment/pdf/preview', [ShipmentController::class, 'previewPdf'])->name('shipment.previewPdf');

Route::resource('users', UserController::class);
Route::resource('dashboard', dashboardController::class);
Route::resource('shipment', ShipmentController::class);
Route::resource('container', ContainerController::class);
