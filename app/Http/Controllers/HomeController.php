<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contactform;
use App\Models\Frontendsetting;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{

public function home(){
    return view('frontend.home.index');
}


public function contact(){
    $branches=Branch::all();
    $website=Frontendsetting::first();
    return view('frontend.contact',compact('branches','website'));
}

public function about(){
    $branches=Branch::all();
    $website=Frontendsetting::first();
    return view('frontend.about',compact('branches','website'));
}

public function service(){
    $services=Service::all();
    return view('frontend.service',compact('services'));
}

public function team(){
    $teams=Team::all();
    return view('frontend.team',compact('teams'));
}

public function portfolio(){
    $portfolios=Portfolio::where('type','portfolio')->get();
    return view('frontend.portfolio',compact('portfolios'));
}


public function serviceDetail($slug){
    $service=Service::where('slug',$slug)->first();
    return view('frontend.service-detail',compact('service'));
}

public function portfolioDetail($slug){
    $portfolio=Portfolio::where('slug',$slug)->first();
    return view('frontend.portfolio-detail',compact('portfolio'));
}

public function contactStore(Request $request){
    $contact=new Contactform();
    $contact->name=$request->name;
    $contact->email=$request->email;
    $contact->phone=$request->phone;
    $contact->date=$request->date;
    $contact->subject=$request->subject;
    $contact->message=$request->message;
   $contact->save();
   return redirect()->back()->with(['success'=>'Message Sent Successfully.','alert-type'=>true]);

}
}
