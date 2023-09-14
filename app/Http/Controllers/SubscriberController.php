<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Mail\subscriberemail;
class SubscriberController extends Controller
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
        
           $email=Subscriber::where('email',$request->email)->first();
        if(!$email){
             $request->validate([
            'email'=>'required|unique:subscribers',
        ]);
        $newslater=new Subscriber;
        $newslater->email=$request->email;
        $newslater->name=$request->name;

        $newslater->save();
            $notification=array(
                'messege'=>'Thank you for subscribing our newslater',
                'alert-type'=>'success'  
                 );
                 Mail::to($request->email)->send(new subscriberemail);
return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Already Subscribed from this email',
                'alert-type'=>'error'  
                 );
          return redirect()->back()->with($notification);
        }
       
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber,$id)
    {
        $sub=Subscriber::find($id);
        $sub->delete();
return redirect()->back()->with('msg','Subscriber Deleted ');

    }
}
