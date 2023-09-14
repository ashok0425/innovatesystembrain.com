<?php

namespace App\Http\Controllers;

use App\Models\vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\apply;
class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy=vacancy::orderBy('id','desc')->get();
        return view('admin.candidate');
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
        $request->validate([
            'name'=>'required|min:3',

            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'message'=>'required',
           



        ]);
        $contact=new vacancy;
        $contact->name=$request->name;

        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->address=$request->address;

        $contact->message=$request->message;
        $contact->salary=$request->salary;
        $contact->intern=$request->intern;

          if($request->file('img')){

          $orginal_name=$request->file('img')->getClientOriginalName();
          $orginal_ext=$request->file('img')->getClientOriginalExtension();
          $filename=rand().".$orginal_ext";
          $imgs=$request->file('img');

          Image::make($imgs)->save('images/team/'.$filename);
  $contact->img="images/team/".$filename;
          }
     if($request->file('cv')){


          $orginal_name=$request->file('cv')->getClientOriginalName();
          $orginal_ext=$request->file('cv')->getClientOriginalExtension();
          $filename=rand().".$orginal_ext";
          $imgs=$request->file('cv');
        $imgs->move('images/team/',$filename);
  $contact->cv="images/team/".$filename;
}
 

$contact->save();
$data=[
    'fname'=>$request->fname,
     'lname'=>$request->lname,
    'phone'=>$request->phone,
    'email'=>$request->email,
    'msg'=>$request->message,

];
$email=DB::table('frontendsettings')->value('email');

Mail::to('falcontechnepal@gmail.com')->send(new apply($data));
$notification=array(
    'messege'=>'Your Application hasbeen forwarded.we will get back to you as soon as possible',
    'alert-type'=>'success'  
     );
    //  Mail::to($request->email)->send(new subscriberemail);
return redirect()->back()->with($notification);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(vacancy $vacancy,$id)
    {
       $vacancy=vacancy::find($id);
       File::delete($vacancy->img);
       File::delete($vacancy->cv);
       $vacancy->delete();

return redirect()->back()->with('msg','candidate Deleted');


    }
}
