<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;


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

Route::middleware('prevent-back-history')->group(function () {
    Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementsController::class, 'store'])->name('announcements.store');
    Route::get('/announcements/{id}/edit', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
    Route::put('/announcements/{id}', [AnnouncementsController::class, 'update'])->name('announcements.update');
    Route::delete('/announcements/{id}', [AnnouncementsController::class, 'destroy'])->name('announcements.destroy');

    Route::middleware('guest')->group(function () {
        // Login Routes
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        // Register Routes
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
    });

    //only logged in users Routes
    Route::middleware('auth')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    //admin routes
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');
    });

    Route::middleware('auth', 'role:student')->group(function () {
        Route::get('student/dashboard', [StudentController::class, 'dashboard'])
            ->name('student.dashboard');
    });

    //student routes

    Route::middleware('auth')->group(function () {

        Route::post('/announcements/{announcement}/like', [LikeController::class, 'like'])->name('announcements.like');
        Route::delete('/announcements/{announcement}/like', [LikeController::class, 'unlike'])->name('announcements.unlike');

    });
});
