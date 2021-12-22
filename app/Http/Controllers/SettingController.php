<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use DB;
use App\Models\Setting;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('settings.index');
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
    public function store(SettingRequest $request)
    {   
            $title=$request->title;
            $description=$request->description;
            $email=$request->email;
          
        
        if ($request->hasFile('logo')) { 
            
            $logo=$request->file('logo');
            $path=public_path('/storage/upload/');
            $name=time().".".$logo->getClientOriginalExtension();
            $logo->move($path, $name);
        }
        if ($request->hasFile('coverphoto')) { 
            
            $coverphoto=$request->file('coverphoto');
            $pathone=public_path('/storage/upload/');
            $nameone=time().".".$coverphoto->getClientOriginalExtension();
            $coverphoto->move($pathone, $nameone);
        }
         $settings= new Setting;
         $settings->title=$title;
         $settings->description=$description;
         $settings->email=$email;
         $settings->logo=$name;
         $settings->cover_photo=$nameone;
         $settings->save();
        
         return redirect()->back()->with('success','Seuccessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $settings=Setting::all();
        return view('settings.show',compact('settings'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
