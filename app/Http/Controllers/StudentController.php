<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class StudentController extends Controller
{
    public function dashboard()
    {
        $announcements = Announcement::latest()->get();
        return view('student.student-dashboard', compact('announcements'));
    }
}
