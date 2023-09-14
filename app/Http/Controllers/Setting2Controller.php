<?php

namespace App\Http\Controllers;

use App\Models\setting2;
use Illuminate\Http\Request;
use Image;
class Setting2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=setting2::find(1);
      return view('admin.extrasetting')->with('arr',$user);
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
     * @param  \App\Models\setting2  $setting2
     * @return \Illuminate\Http\Response
     */
    public function show(setting2 $setting2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting2  $setting2
     * @return \Illuminate\Http\Response
     */
    public function edit(setting2 $setting2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting2  $setting2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting2 $setting2)
    {
   
        $setting2=setting2::find(1);
     
        $setting2->about_details=$request->privacy_policy;
if($request->file('logo')){
    $orginal_name=$request->file('logo')->getClientOriginalName();
    $orginal_ext=$request->file('logo')->getClientOriginalExtension();
    $filename=rand().".$orginal_ext";
    $imgs=$request->file('logo');
    Image::make($imgs)->save('images/setting/'.$filename);
$setting2->logo="images/setting/".$filename;
}
if($request->file('img')){
    $orginal_name=$request->file('img')->getClientOriginalName();
    $orginal_ext=$request->file('img')->getClientOriginalExtension();
    $filename=rand().".$orginal_ext";
    $imgs=$request->file('img');
    Image::make($imgs)->save('images/setting/'.$filename);
$setting2->testimonial_img="images/setting/".$filename;
}

$setting2->save();
return redirect()->back()->with('msg','Extra setting Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting2  $setting2
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting2 $setting2)
    {
        //
    }
}
