<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AdminController extends Controller
{
    public function dashboard()
    {
        $announcements = Announcement::latest()->paginate(5);
        $announcements->onEachSide(4);
        return view('users.admin.dashboard', compact('announcements'));
    }
}
