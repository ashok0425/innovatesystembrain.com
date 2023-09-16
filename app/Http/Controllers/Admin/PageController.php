<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->save('images/blog/' . $filename);
        $page = new Page();
        $page->thumbnail = 'images/blog/' . $filename;
        $page->title = $request->title;
        $page->name = $request->name;
        $page->slug = Str::slug($request->name);

        $page->short_desc = $request->short_desc;
        $page->descr = $request->descr;
        $page->save();
        return redirect()->back()->with('msg', 'New Page added');
    }


    public function show(Blog $blogs)
    {
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit',compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        if ($request->thumbnail) {
            FIle::delete($page->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->save('images/blog/' . $filename);
            $page->thumbnail = 'images/blog/' . $filename;
        }
        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->title = $request->title;
        $page->short_desc = $request->short_desc;
        $page->descr = $request->descr;
        $page->save();
        return redirect()->back()->with('msg', 'Page updated');
    }


    public function destroy(Page $page)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($page->thumbnail);
        $page->delete();
        return redirect()->back()->with('msg', "Page deleted");
    }
}
