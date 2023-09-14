<?php

namespace App\Http\Controllers;

use App\Models\QA;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;
class QAController extends Controller
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
        return view('admin.addQ&A');
        
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
            'title'=>'required',
            'privacy_policy'=>'required',

            
        ]);
$user=new QA;

        if($request->file('img')){
            $orginal_name=$request->file('img')->getClientOriginalName();
            $orginal_ext=$request->file('img')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
    $imgs=$request->file('img');
    Image::make($imgs)->save('images/banner/'.$filename);
$user->thumbnail="images/banner/".$filename;

        }
        


$user->title=$request->title;
$user->descr=$request->privacy_policy;

$user->save();
return redirect()->back()->with('msg','New Opportunity added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function show(QA $qA)
    {
        $user=QA::all();

        return view('admin.Q&A')->with('arr',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function edit(QA $qA,$id)
    {
        $user=QA::find($id);
        return view('admin.editqna')->with('arr',$user);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QA $qA)
    {
        $user=QA::find($request->id);
        if($request->file('img')){
            $orginal_name=$request->file('img')->getClientOriginalName();
            $orginal_ext=$request->file('img')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
    $imgs=$request->file('img');
    Image::make($imgs)->save('images/banner/'.$filename);
$user->thumbnail="images/banner/".$filename;
$user->thumbnail="images/banner/".$filename;

        }
        


$user->title=$request->title;
$user->descr=$request->privacy_policy;

$user->save();
return redirect()->back()->with('msg','New Opportunity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function destroy(QA $qA,$id)
    {
        $user=QA::find($id);
        File::delete($user->thumbnail);
        $user->delete();
        return redirect()->back()->with('msg',"Vacancy deleted");
    }
}
