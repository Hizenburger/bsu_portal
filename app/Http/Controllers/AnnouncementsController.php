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
        $announcements = Announcement::with('user')->latest()->get();

        return view('dashboard', ['announcements' => $announcements]);
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

    //create view or modal
    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        //Validate that it is not empty and is a string
        $validated = $request->validate(
            [
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img/announcements', $imageName);

            $validated['image'] = $imageName;
        }



        //store in the database
        Announcement::create($validated);

        //return to dashboard with success meassage stored in 'success'
        return redirect()->route('dashboard')->with('success', 'Announcement is posted!');
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
