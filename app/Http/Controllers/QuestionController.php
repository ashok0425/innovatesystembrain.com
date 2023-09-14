<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;
class QuestionController extends Controller
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
        return view('admin.addquestion');
        
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
            'question'=>'required',
            'answer'=>'required',

            
        ]);
$user=new question;

        if($request->file('img')){
            $orginal_name=$request->file('img')->getClientOriginalName();
            $orginal_ext=$request->file('img')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
    $imgs=$request->file('img');
    Image::make($imgs)->save('images/banner/'.$filename);
$user->thumbnail="images/banner/".$filename;

        }
        


$user->question=$request->question;
$user->answer=$request->answer;

$user->save();
return redirect()->back()->with('msg','Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function show(question $qA)
    {
        $user=question::all();

        return view('admin.question')->with('arr',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function edit(question $qA,$id)
    {
        $user=question::find($id);
        return view('admin.editquestion')->with('arr',$user);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        $user=question::find($request->id);
        if($request->file('img')){
            $orginal_name=$request->file('img')->getClientOriginalName();
            $orginal_ext=$request->file('img')->getClientOriginalExtension();
            $filename=rand().".$orginal_ext";
    $imgs=$request->file('img');
    Image::make($imgs)->save('images/banner/'.$filename);
$user->thumbnail="images/banner/".$filename;
$user->thumbnail="images/banner/".$filename;

        }
        


$user->question=$request->question;
$user->answer=$request->answer;

$user->save();
return redirect()->back()->with('msg','updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $qA,$id)
    {
        $user=question::find($id);
        $user->delete();
        return redirect()->back()->with('msg'," deleted");
    }
}
