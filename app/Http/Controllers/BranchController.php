<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;
use Image;
use File;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch=branch::all();
        return view('admin.branch',compact('branch'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addbranch');

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
            'thumbnail'=>'mimes:jpg,jpeg,png,gif',
            'name'=>'required',
            
            // 'privacy_policy'=>'required',



            
        ]);
$user=new branch;

        if($request->thumbnail){
            $orginal_name=$request->file('thumbnail')->getClientOriginalName();
            $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
            $imgs=$request->file('thumbnail');
            Image::make($imgs)->save('images/branch/'.$filename);
$user->img="images/branch/".$filename;

        }
     
$user->name=$request->name;
$user->phone=$request->phone;
$user->post=$request->post;


$user->save();
return redirect()->back()->with('msg','Product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(branch $branch,$id)
    {
        $user=branch::find($id);
        return view('admin.editbranch')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, branch $branch)
    {
        $id=$request->id;
        $user=branch::find($id);

        if($request->thumbnail){
      File::delete($user->img);

            $orginal_name=$request->file('thumbnail')->getClientOriginalName();
            $orginal_ext=$request->file('thumbnail')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
            $imgs=$request->file('thumbnail');
            Image::make($imgs)->save('images/branch/'.$filename);
$user->img="images/branch/".$filename;

        }
     
$user->name=$request->name;
$user->phone=$request->phone;
$user->post=$request->post;


$user->save();
return redirect()->back()->with('msg','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(branch $branch,$id)
    {
        $user=branch::find($id);
      File::delete($user->img);
        $user->delete();
        return redirect()->back()->with('msg',"branch deleted");
    }
}
