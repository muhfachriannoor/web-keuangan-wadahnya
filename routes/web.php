<?php

use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DataKeuangan\DataKeuanganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    // return view('welcome');
    return redirect(route('login'));
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('dashboard/data-keuangan', DataKeuanganController::class);

