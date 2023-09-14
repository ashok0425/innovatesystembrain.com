<?php

namespace App\Http\Controllers;

use App\Mail\Hiremail;
use App\Models\Hire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use File;
class HireController extends Controller
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
            'message'=>'required',
            'interest'=>'required',
            'budget'=>'required',



        ]);
        try {
            //code...
      
        $contact=new Hire;
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->interest=$request->interest;
        $contact->budget=$request->budget;


$contact->save();
$data=array([
    'email'=>$request->email,
    'phone'=>$request->phone,
    'name'=>$request->name,
    'message'=>$request->message,
    'budget'=>$request->budget,
    'interest'=>$request->interest,



]);
$email=DB::table('frontendsettings')->value('email');

Mail::to($email)->send(new Hire($data));
$notification=array(
    'messege'=>'Thank you for reaching out to us '.$request->name,
    'alert-type'=>'success'  
     );
return redirect()->route('/')->with($notification);


} catch (\Throwable $th) {
    $notification=array(
        'messege'=>'Something went wrong.Please try again later',
        'alert-type'=>'error'  
         );
  return redirect()->back()->with($notification);
}
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactform  $contactform
     * @return \Illuminate\Http\Response
     */
    public function show(contactform $contactform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactform  $contactform
     * @return \Illuminate\Http\Response
     */
    public function edit(contactform $contactform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactform  $contactform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactform $contactform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactform  $contactform
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactform $contactform,$id)
    {
        $sub=contactform::find($id);
        $sub->delete();
return redirect()->back()->with('msg','Contact Deleted ');
    }
}
