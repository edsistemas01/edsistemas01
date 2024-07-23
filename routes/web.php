<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('historys', 'App\Http\Controllers\HistoryController')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('doctors', DoctorController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('historys', HistoryController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
//Route::delete('/historys/{id}', [HistoryController::class, 'destroy'])->name('historys.destroy');

/* Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout'); */
