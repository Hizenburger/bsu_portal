<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/login', function () {
//     return view('auth.login');
// }) ->name('login'); ;


//Register Routes

Route::middleware('auth')->group(function () {
    Route::post('/logout', Logout::class)->name('logout');

    Route::get('/dashboard', function () {
        return view('admin.admin-dashboard');
    })->name('dashboard');
});

// Login Routes
Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::post('/login', Login::class)->middleware('guest');

// Register Routes
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', Register::class)->middleware('guest');
