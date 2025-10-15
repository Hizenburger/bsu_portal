<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementsController extends Controller
{

    public function index()
    {
        $annoncements = Announcement::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('dashboard', ['announcements' => $annoncements]);
    }

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
            ]
        );

        //store in the database
        Announcement::create($validated);

        //return to dashboard with success meassage stored in 'success'
        return redirect()->route('')->with('success', 'Announcement is posted!');
    }

    //pass the id of the announcement for identifying what to edit
    public function edit($id)
    {
        //store in $announcement the announcement that matches the id we passed from our Announcement table
        //findOrFail($id) takes an id and returns a single model. If no matching model exist, it throws an error.

        $anouncement = Announcement::findOrFail($id);

        //compact('announcement') → turns the variable $announcement into an associative array ['announcement' => $announcement]
        return view('', compact('announcment'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        //store the the matched id in this variable
        $announcement = Announcement::findOrFail($id);
        // -> calls the update method and stores the changes
        $announcement->update($validate);
    }

    public function delete($id)
    {
        $announcement = Announcement::findOrFail($id);
        // calls on delete method upon itself
        $announcement->delete(); 

        return redirect()-> route('')->with('success', 'Announcement deleted');
    }
}
