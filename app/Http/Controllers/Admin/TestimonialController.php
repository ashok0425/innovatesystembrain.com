<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
        $orginal_name = $request->file('thumbnail')->getClientOriginalName();
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->save('images/testimonial/' . $filename);
        $testimonial = new Testimonial();
        $testimonial->thumbnail = 'images/testimonial/' . $filename;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->descr = $request->descr;
        $testimonial->save();
        return redirect()->back()->with('msg', 'New testimonial added');
    }


    public function show(Testimonial $testimonials)
    {
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $id = $request->id;
        if ($request->thumbnail) {
            FIle::delete($testimonial->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_name = $request->file('thumbnail')->getClientOriginalName();
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->resize(200,200)->save('images/testimonial/' . $filename);
            $testimonial->thumbnail = 'images/testimonial/' . $filename;
        }

        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->descr = $request->descr;
        $testimonial->save();
        return redirect()->back()->with('msg', 'Testimonial updated');
    }


    public function destroy(Testimonial $testimonial)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($testimonial->thumbnail);
        $testimonial->delete();
        return redirect()->back()->with('msg', "Testimonial deleted");
    }
}
