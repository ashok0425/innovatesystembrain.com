<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Http\Controllers\Controller;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'name' => 'required',

        ]);
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();
        return redirect()->back()->with('msg', 'New Branch added');
    }


    public function show(Branch $branch)
    {
    }

    public function edit(Branch $branch)
    {
        return view('admin.branch.edit',compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'name' => 'required',

        ]);
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();
        return redirect()->back()->with('msg', 'Branch updated');
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->back()->with('msg', "Branch deleted");
    }
}
