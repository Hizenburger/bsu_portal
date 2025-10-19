<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Announcement $announcement)
    {
        $user_id = Auth::id();
        $announcement->likes()->firstOrCreate([
            'user_id' =>  $user_id,
        ]);

        return response()->json([
            'likes_count' => $announcement->likes()->count(),
        ]);
    }

    public function unlike(Announcement $announcement)
    {
        $user_id = Auth::id();
        $announcement->likes()->where('user_id',  $user_id)->delete();

        return response()->json([
            'likes_count' => $announcement->likes()->count(),
        ]);
    }
}
