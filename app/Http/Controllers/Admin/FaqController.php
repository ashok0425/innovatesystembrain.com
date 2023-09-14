<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Image;
use File;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq = new Faq();
        $faq->answer = $request->answer;
        $faq->question = $request->question;
        $faq->save();
        return redirect()->back()->with('msg', 'New Faq added');
    }


    public function show(Faq $faqs)
    {
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit',compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq->answer = $request->answer;
        $faq->question = $request->question;
        $faq->save();
        return redirect()->back()->with('msg', 'Faq updated');
    }


    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('msg', "Faq deleted");
    }
}
