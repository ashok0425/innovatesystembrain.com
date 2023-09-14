<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required',
        ]);
        $orginal_name = $request->file('thumbnail')->getClientOriginalName();
        $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
        $filename = rand() . ".$orginal_ext";
        $imgs = $request->file('thumbnail');
        Image::make($imgs)->save('images/portfolio/' . $filename);
        $portfolio = new Portfolio();
        $portfolio->thumbnail = 'images/portfolio/' . $filename;
        $portfolio->title = $request->title;
        $portfolio->short_desc = $request->short_desc;
        $portfolio->descr = $request->descr;
        $portfolio->save();
        return redirect()->back()->with('msg', 'New portfolio added');
    }


    public function show(Portfolio $portfolios)
    {
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit',compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $id = $request->id;
        if ($request->thumbnail) {
            FIle::delete($portfolio->thumbnail);

            $request->validate([
                'thumbnail' => 'required|mimes:jpg,jpeg,png,gif|max:2048',

            ]);
            $orginal_name = $request->file('thumbnail')->getClientOriginalName();
            $orginal_ext = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = rand() . ".$orginal_ext";
            $imgs = $request->file('thumbnail');
            Image::make($imgs)->save('images/portfolio/' . $filename);
            $portfolio->thumbnail = 'images/portfolio/' . $filename;
        }

        $portfolio->title = $request->title;
        $portfolio->short_desc = $request->short_desc;
        $portfolio->descr = $request->descr;
        $portfolio->save();
        return redirect()->back()->with('msg', 'Portfolio updated');
    }


    public function destroy(Portfolio $portfolio)
    {
        // \Storage::delete($user->thumbnail);
        FIle::delete($portfolio->thumbnail);
        $portfolio->delete();
        return redirect()->back()->with('msg', "Portfolio deleted");
    }
}
