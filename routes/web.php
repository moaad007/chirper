<?php
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ContactConntroller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ChirpController::class, 'index']);
Route::post('/chirps', [ChirpController::class, 'store']);

Route::get('/contact',[ContactConntroller::class, 'index']);
Route::get('/about', function () { 
return view('components.about'); 
});