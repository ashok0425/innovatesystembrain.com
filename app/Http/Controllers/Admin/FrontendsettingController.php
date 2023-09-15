<?php

namespace App\Http\Controllers\Admin;

use App\Models\Frontendsetting;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;
use App\Http\Controllers\Controller;
use App\Models\Contactform;

class FrontendsettingController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Frontendsetting::find(1);
      return view('admin.setting.frontend',compact('setting'));
    }

    public function contactList()
    {
        $contacts=Contactform::orderBy('id','desc')->get();
      return view('admin.contact.index',compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\frontendsetting  $frontendsetting
     * @return \Illuminate\Http\Response
     */
    public function show(frontendsetting $frontendsetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\frontendsetting  $frontendsetting
     * @return \Illuminate\Http\Response
     */
    public function edit(frontendsetting $frontendsetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\frontendsetting  $frontendsetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontendsetting $frontendsetting)
    {
        $setting=Frontendsetting::find(1);
$setting->email=$request->email;
$setting->phone=$request->phone;
$setting->openingtime=$request->openingtime;
$setting->facebook=$request->facebook;
$setting->twitter=$request->twitter;
$setting->instagram=$request->instagram;
$setting->youtube=$request->youtube;
$setting->linkdin=$request->linkdin;
$setting->copyright=$request->copyright;
$setting->developed=$request->developed;
$setting->meta_title=$request->meta_title;
$setting->meta_keyword=$request->meta_keyword;
$setting->meta_description=$request->meta_description;
if ($request->logo) {
    FIle::delete($setting->logo);
    $orginal_ext = $request->file('logo')->getClientOriginalExtension();
    $filename = rand() . ".$orginal_ext";
    $imgs = $request->file('logo');
    Image::make($imgs)->save('images/logo/' . $filename);
    $setting->logo = 'images/logo/' . $filename;
}

if ($request->fev) {
    File::delete($setting->fev);
    $orginal_ext = $request->file('fev')->getClientOriginalExtension();
    $filename = rand() . ".$orginal_ext";
    $imgs = $request->file('fev');
    Image::make($imgs)->save('images/logo/' . $filename);
    $setting->fev = 'images/logo/' . $filename;
}
$setting->save();
return redirect()->back()->with('msg','Frontend information updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\frontendsetting  $frontendsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontendsetting $frontendsetting)
    {
        //
    }
}
