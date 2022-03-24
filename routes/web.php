<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Middleware\CheckLogin;
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

Route::get('/login',[AuthenticateController::class, 'login'])->name ('login');
Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');


Route::middleware([CheckLogin::class])->group(function (){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout',[AuthenticateController::class, 'logout'])->name('logout');
    Route::resource('account',App\Http\Controllers\AccoutController::class);
    Route::resource('service_s',App\Http\Controllers\ServiceController::class);
    Route::resource('kind_of_room',App\Http\Controllers\LoaiPhongController::class);
    Route::resource('room_for_rest',App\Http\Controllers\PhongNghiController::class);
    Route::resource('invoice',App\Http\Controllers\InvoiceController::class);
    Route::resource('invoice_room',App\Http\Controllers\InvoiceRoomController::class);
    Route::resource('detailed_invoice',App\Http\Controllers\DetailedInvoiceController::class);
});
