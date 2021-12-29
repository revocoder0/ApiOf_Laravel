<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use Illuminate\Http\Request;
use App\Models\Social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::orderby('id', 'DESC')->paginate(5);
       return view('social.index', compact('socials'));
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
    public function store(SocialRequest $request)
    {
        $icon = $request->icon;
        $name = $request->name;
        $link = $request->link;
        $social = new Social;
        $social->icon = $icon;
        $social->name = $name;
        $social->link = $link;
        $social->save();
        return redirect()->back()->with('success', 'Record inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, $id)
    {
        $name = $request->name;
        $icon = $request->icon;
        $link = $request->link;
        $social = Social::findOrFail($id);
        $social->name = $name;
        $social->icon = $icon;
        $social->link = $link;
        $social->save();
        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Social::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'Record Deleted successfully!');
        }
    }
}
