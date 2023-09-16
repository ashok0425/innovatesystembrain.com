<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug=Str::slug($request->title);

        $request->validate([
            'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required',
            'descr' => 'required',
        ]);
       $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->resize(200,300)->save('images/service/' . $filename);

        $service = new Service();
        if ($request->cover_image) {
            $orginal_ext = $request->file('cover_image')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('cover_image');
            Image::make($imgs)->resize(1000,300)->save('images/service/' . $filename);
            $service->cover_image = 'images/service/' . $filename;
        }
        $service->thumbnail = 'images/service/' . $filename;
        $service->title = $request->title;
        $service->descr = $request->descr;
        $service->slug = $slug;
        $service->save();
        return redirect()->back()->with('msg', 'new service added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $slug=Str::slug($request->title);
        if ($request->has('thumbnail')) {
            FIle::delete($service->thumbnail);
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->resize(200,300)->save('images/service/' . $filename);
            $service->thumbnail = 'images/service/' . $filename;
        }

        if ($request->has('cover_image')) {
            FIle::delete($service->cover_image);
            $orginal_ext = $request->file('cover_image')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('cover_image');
            Image::make($imgs)->resize(1000,300)->save('images/service/' . $filename);
            $service->cover_image = 'images/service/' . $filename;
        }

        $service->title = $request->title;
        $service->descr = $request->descr;
        $service->slug = $slug;
        $service->save();
        return redirect()->back()->with('msg', 'Service updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($service->thumbnail);
        $service->delete();
        return redirect()->back()->with('msg', "Service deleted");
    }
}
