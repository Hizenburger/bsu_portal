<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $UserRole = Auth::user()->role;
        if ($UserRole === 'admin') {
            return view('admin.admin-dashboard');
        } elseif ($UserRole === 'faculty') {
            return view('faculty.faculty-dashboard');
        } elseif ($UserRole === 'student') {
            return view('student.student-dashboard');
        } else {
            Auth::logout();
            return redirect('/login')->withErrors(['role' => 'Unauthorized role. Please contact support.']);
        }
    }
}
