<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementsController;

//example Route
Route::get('/', function () {
    return view('welcome');
});



// Route::get('/login', function () {
//     return view('auth.login');
// }) ->name('login'); ;



// Route::post('/logout', Logout::class)->middleware('auth');


// //admin
// Route::middleware(['admin', 'auth'])->group(function () {
//     Route::get('/dashboard', 'admin.admin-dashboard');
// });

Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements.index');
Route::get('/announcements/create', [AnnouncementsController::class, 'create'])->name('announcements.create');
Route::post('/announcements', [AnnouncementsController::class, 'store'])->name('announcements.store');
Route::get('/announcements/{id}/edit', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
Route::put('/announcements/{id}', [AnnouncementsController::class, 'update'])->name('announcements.update');
Route::delete('/announcements/{id}', [AnnouncementsController::class, 'destroy'])->name('announcements.destroy');

Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
    // Register Routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
});

//Register Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');
});
