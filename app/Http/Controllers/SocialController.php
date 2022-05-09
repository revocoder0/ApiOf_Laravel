<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\File;

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
            $image = $request->file('image'); 
        $name = $request->name;
        $link = $request->link;
        $photo = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/storage/uploads/');
        $image->move($path, $photo);
        $social = new Social;
        $social->icon = $photo;
        $social->name = $name;
        $social->link = $link;
        $social->save();
        return redirect()->back()->with('success', 'Record created successfully!');
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
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=> 'required|string|max:100',
            'link' => 'required|string|max:244',
            'image'=>'nullable|image|max:1024|mimes:jpg,png,jpeg'
        ]);
        $social = Social::find($id);
        $social->name = $request->get('name');
        $social->link = $request->get('link');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $photo = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/storage/uploads/');
                File::delete(public_path('/storage/uploads/'.$social->icon));
                $image->move($path, $photo);
                $social->icon = $photo;
            }
        $social->save();
        return redirect()->back()->with('success', 'Record Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socials = Social::findOrFail($id);
        if ($socials->delete()){
            $path=public_path('/storage/uploads/');
            if(isset($socials->icon)) {
                $photo=$socials->icon;
                File::delete($path.''.$photo);
                return redirect()->back()->with('success', 'Record Deleted successfully!');
                }else{
                    return redirect()->back();
                }
        }
       
    }
}
