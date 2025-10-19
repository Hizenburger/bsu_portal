<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AdminController extends Controller
{
    public function dashboard()
    {
        $announcements = Announcement::latest()->get();
        return view('users.admin.dashboard', compact('announcements'));
    }
}
