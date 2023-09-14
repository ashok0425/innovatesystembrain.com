<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            // 'descr' => 'required',
        ]);
        $orginal_name = $request->file('thumbnail')->getClientOriginalName();
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->save('images/banner/' . $filename);
        $banner = new Banner();
        $banner->thumbnail = 'images/banner/' . $filename;
        $banner->title = $request->title;
        $banner->descr = $request->descr;
        $banner->save();
        return redirect()->back()->with('msg', 'New banner added');
    }


    public function show(Banner $banners)
    {
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        if ($request->thumbnail) {
            File::delete($banner->thumbnail);
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->save('images/banner/' . $filename);
            $banner->thumbnail = 'images/banner/' . $filename;
        }

        $banner->title = $request->title;
        $banner->descr = $request->descr;
        $banner->save();
        return redirect()->back()->with('msg', 'Banner updated');
    }


    public function destroy(Banner $banner)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($banner->thumbnail);
        $banner->delete();
        return redirect()->back()->with('msg', "Banner deleted");
    }
}
