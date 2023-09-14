<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required',
        ]);
        $orginal_name = $request->file('thumbnail')->getClientOriginalName();
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->resize(200,300)->save('images/blog/' . $filename);
        $blog = new Blog();
        $blog->thumbnail = 'images/blog/' . $filename;
        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->descr = $request->descr;
        $blog->save();
        return redirect()->back()->with('msg', 'New blog added');
    }


    public function show(Blog $blogs)
    {
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $id = $request->id;
        if ($request->thumbnail) {
            FIle::delete($blog->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_name = $request->file('thumbnail')->getClientOriginalName();
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->resize(200,300)->save('images/blog/' . $filename);
            $blog->thumbnail = 'images/blog/' . $filename;
        }

        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->descr = $request->descr;
        $blog->save();
        return redirect()->back()->with('msg', 'Blog updated');
    }


    public function destroy(Blog $blog)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($blog->thumbnail);
        $blog->delete();
        return redirect()->back()->with('msg', "Blog deleted");
    }
}
