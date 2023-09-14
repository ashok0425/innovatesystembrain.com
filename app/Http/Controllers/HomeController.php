<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Frontendsetting;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
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
}
