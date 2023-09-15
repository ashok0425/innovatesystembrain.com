<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'name' => 'required',
            'position' => 'required',
        ]);
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->resize(300,200)->save('images/team/' . $filename);
        $team = new Team();
        $team->thumbnail = 'images/team/' . $filename;
        $team->name = $request->name;
        $team->position = $request->position;
        $team->descr = $request->descr;
        $team->save();
        return redirect()->back()->with('msg', 'New team added');
    }


    public function show(Team $teams)
    {
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit',compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $id = $request->id;
        if ($request->thumbnail) {
            FIle::delete($team->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_name = $request->file('thumbnail')->getClientOriginalName();
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->resize(300,200)->save('images/team/' . $filename);
            $team->thumbnail = 'images/team/' . $filename;
        }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->descr = $request->descr;
        $team->save();
        return redirect()->back()->with('msg', 'Team updated');
    }


    public function destroy(Team $team)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($team->thumbnail);
        $team->delete();
        return redirect()->back()->with('msg', "Team deleted");
    }
}
