<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends Controller
{

    //return all announcements
    public function index()
    {
        //eager loading to prevent multiple queries when looping
        $announcements = Announcement::with('user')->latest()->get();

        $paginatedAnnouncements = Announcement::with('user')->latest()->paginate(5);

        return view('dashboard', ['announcements' => $announcements, 'paginatedAnnouncements' => $paginatedAnnouncements]);
    }

    //return archieved announcements
    public function archived()
    {
        $announcements = Announcement::with('user')->latest()->onlyThrashed();
        return view('archieve.announcement', ['announcements' => $announcements]);
    }

    //user announcements
    public function posts($user_id)
    {
        // get the posts that matches the current user ID
        $announcements = Announcement::with('user')
            ->where('user_id', $user_id)
            ->get();

        return view('announcements.user', compact('announcements'));
    }

    public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Attach the logged-in user ID
        $validated['user_id'] = Auth::id();



        // Handle image upload if provided
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('storage/app/public/img/announcements/', $imageName);
            // Store only the path relative to "storage/"
            $validated['image_url'] = 'storage/app/public/img/announcements/' . $imageName;
        }

        // Save to database
        Announcement::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Announcement posted successfully!');
    }

    //pass the id of the announcement for identifying what to edit
    public function edit($id)
    {
        //store in $announcement the announcement that matches the id we passed from our Announcement table
        //findOrFail($id) takes an id and returns a single model. If no matching model exist, it throws an error.

        $anouncement = Announcement::findOrFail($id);

        //compact('announcement') → turns the variable $announcement into an associative array ['announcement' => $announcement]
        return view('', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // attach logged-in user by accessing the logged-in user's id
        $validated['user_id'] = Auth::id();
        //store the the matched id in this variable
        $announcement = Announcement::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete the old image if it exists
            if ($announcement->image) {
                Storage::delete('public/img/announcements/' . $announcement->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img/announcements', $imageName);
            $validated['image'] = $imageName;
        }

        // -> calls the update method and stores the changes
        $announcement->update($validate);
    }

    public function delete($id)
    {
        $announcement = Announcement::findOrFail($id);
        // this dete only archives not permanently delete
        $announcement->delete();

        return redirect()->route('dashboard')->with('success', 'Announcement deleted');
    }
}
