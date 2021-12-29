<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\File;
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Setting::get();
        $setting = $settings[0];
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {  
        $setting=Setting::get();
        if($setting->isEmpty()){
            $title=$request->title;
            $email=$request->email;
            $description=$request->description;
            if($request->hasFile('logo')){
                $logo=$request->file('logo');
                $path=public_path('/storage/upload');
                $logoname=time().".".$logo->getClientOriginalExtension();
                $logo->move($path,$logoname);
            }
            if($request->hasFile('coverphoto')){
                $coverphoto=$request->file('coverphoto');
                $path=public_path('/storage/upload');
                $covername=time().".".$coverphoto->getClientOriginalExtension();
                $coverphoto->move($path,$covername);
            }
            $sobj=new Setting;
            $sobj->title=$title;
            $sobj->email=$email;
            $sobj->description=$description;
            $sobj->logo=$logoname;
            $sobj->cover_photo=$covername;
            $sobj->save();
            return back()->with('success','Record create successfully!');  
        }else{
            $sobj = $setting[0];
            $title=$request->title;
            $email=$request->email;
            $description=$request->description;
            if($request->hasFile('logo')){
                $logo=$request->file('logo');
                $path=public_path('/storage/upload');
                $logoname=time().".".$logo->getClientOriginalExtension();
                $logo->move($path,$logoname);
                if (isset($sobj->logo)) {
                    $oldlogo = $sobj->logo;
                    File::delete($path . '' . $oldlogo);
                }
                $sobj->logo=$logoname;
            }
            if($request->hasFile('coverphoto')){
                $coverphoto=$request->file('coverphoto');
                $path=public_path('/storage/upload');
                $covername=time().".".$coverphoto->getClientOriginalExtension();
                $coverphoto->move($path,$covername);
                if (isset($sobj->cover_photo)) {
                    $oldcover = $sobj->cover_photo;
                    File::delete($path . '' . $oldcover);
                }
                $sobj->cover_photo=$covername;
            }
            $sobj->title=$title;
            $sobj->email=$email;
            $sobj->description=$description;
            $sobj->save();
            return back()->with('success','Record updated successfully!');  
            
        }
            
        
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
