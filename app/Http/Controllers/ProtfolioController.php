<?php

namespace App\Http\Controllers;

use App\Models\protfolio;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\DB;
class ProtfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addprotfolio');

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
            'thumbnail'=>'required|mimes:jpg,jpeg,png,gif|max:2048'
           

            
        ]);
        $orginal_name=$request->file('thumbnail')->getClientOriginalName();
        $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
        $filename=rand().".$orginal_ext";
        $imgs=$request->file('thumbnail');
        Image::make($imgs)->save('images/protofolio/'.$filename);
$user=new protfolio;
$user->thumbnail="images/protofolio/".$filename;
$user->title=$request->title;
$user->proto=$request->proto;
$user->descr=$request->link;
$user->save();
return redirect()->back()->with('msg','New Project added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function show(protfolio $protfolio)
    {
        $user=protfolio::all();

        return view('admin.protfolio')->with('arr',$user);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(protfolio $protfolio,$id)
    {
        $user=protfolio::find($id);

        return view('admin.editportfolio')->with('port',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, protfolio $protfolio)
    {
    $id=$request->id;

$user=protfolio::find($id);

      if($request->thumbnail){
          File::delete($user->thumbanil);
        $orginal_name=$request->file('thumbnail')->getClientOriginalName();
        $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
        $filename=rand().".$orginal_ext";
        $imgs=$request->file('thumbnail');
        Image::make($imgs)->save('images/protofolio/'.$filename);
$user->thumbnail="images/protofolio/".$filename;
      }
        
$user->title=$request->title;
$user->proto=$request->proto;
$user->descr=$request->link;
$user->save();
return redirect()->back()->with('msg','Portfolio updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(protfolio $protfolio,$id)
    {
        $user=protfolio::find($id);
        File::delete($user->thumbnail);
        $user->delete();
        return redirect()->back()->with('msg',"Protfolio deleted");
    }



// project 


public function Projectcreate()
{
    return view('admin.addproject');

}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function Projectstore(Request $request)
{
    $request->validate([
        'thumbnail'=>'required|mimes:jpg,jpeg,png,gif|max:2048'
       

        
    ]);
    $orginal_name=$request->file('thumbnail')->getClientOriginalName();
    $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
    $filename=rand().".$orginal_ext";
    $imgs=$request->file('thumbnail');
    Image::make($imgs)->save('images/protofolio/'.$filename);
    $user=array();

$user['thumbnail']="images/protofolio/".$filename;
$user['name']=$request->name;
$user['descr']=$request->description;
$user['title']=$request->title;


$user['link']=$request->link;


DB::table('projects')->insert($user);
return redirect()->back()->with('msg','New Protfolio added');
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\protfolio  $protfolio
 * @return \Illuminate\Http\Response
 */
public function Projectshow(protfolio $protfolio)
{
    $user=DB::table('projects')->get();

    return view('admin.project')->with('arr',$user);
    
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\protfolio  $protfolio
 * @return \Illuminate\Http\Response
 */
public function Projectedit(protfolio $protfolio,$id)
{
    $project=DB::table('projects')->where('id',$id)->first();

    return view('admin.editproject')->with('project',$project);
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\protfolio  $protfolio
 * @return \Illuminate\Http\Response
 */
public function Projectupdate(Request $request)
{
$id=$request->id;

$user=array();
  if($request->thumbnail){
      File::delete($user->thumbanil);
    $orginal_name=$request->file('thumbnail')->getClientOriginalName();
    $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
    $filename=rand().".$orginal_ext";
    $imgs=$request->file('thumbnail');
    Image::make($imgs)->save('images/protofolio/'.$filename);
$user->thumbnail="images/protofolio/".$filename;
  }
$user['name']=$request->name;
$user['descr']=$request->description;
$user['title']=$request->title;


$user['link']=$request->link;

DB::table('projects')->where('id',$id)->update($user);
return redirect()->back()->with('msg','Portfolio updated');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\protfolio  $protfolio
 * @return \Illuminate\Http\Response
 */
public function Projectdestroy(protfolio $protfolio,$id)
{
    $user=DB::table('projects')->where('id',$id)->first();
    File::delete($user->thumbnail);
    $user=DB::table('projects')->where('id',$id)->delete();

    return redirect()->back()->with('msg',"project deleted");
}









}
