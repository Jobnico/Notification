<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; # don't forgot to add this

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('send', [HomeController::class , "sendnotification"]);

Auth::routes();


Route::get('/home', [HomeController::class , 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
