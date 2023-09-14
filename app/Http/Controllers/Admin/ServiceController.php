<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;

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
        $request->validate([
            'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required',
            'descr' => 'required',
        ]);
        $orginal_name = $request->file('thumbnail')->getClientOriginalName();
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->save('images/service/' . $filename);
        $service = new Service();
        $service->thumbnail = 'images/service/' . $filename;
        $service->title = $request->title;
        $service->descr = $request->descr;
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
        $id = $request->id;
        if ($request->thumbnail) {
            FIle::delete($service->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_name = $request->file('thumbnail')->getClientOriginalName();
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->save('images/service/' . $filename);
            $service->thumbnail = 'images/service/' . $filename;
        }

        $service->title = $request->title;
        $service->descr = $request->descr;
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
