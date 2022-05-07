<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

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
    public function edit(Request $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            return view('settings.index');
        } else {
            return view('settings.edit', compact('setting'));
        }
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
        $setting = Setting::first();
        if (!$setting) {
            $title = $request->title;
            $email = $request->email;
            $description = $request->description;
            $sobj = new Setting;
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $path = public_path('/storage/upload');
                $logoname = time() . "." . $logo->getClientOriginalExtension();
                $logo->move($path, $logoname);
                $sobj->logo = $logoname;
            }
            if ($request->hasFile('coverphoto')) {
                $coverphoto = $request->file('coverphoto');
                $path = public_path('/storage/upload');
                $covername = time() . "." . $coverphoto->getClientOriginalExtension();
                $coverphoto->move($path, $covername);
                $sobj->cover_photo = $covername;
            }
            
            $sobj->title = $title;
            $sobj->email = $email;
            $sobj->description = $description;
            
            
            $sobj->save();
            return back()->with('success', 'Setting create successfully!');
        } else {
            $title = $request->title;
            $email = $request->email;
            $description = $request->description;
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $path = public_path('/storage/upload');
                $logoname = time() . "." . $logo->getClientOriginalExtension();
                $logo->move($path, $logoname);
                if (isset($setting->logo)) {
                    $oldlogo = $setting->logo;
                    File::delete($path . '' . $oldlogo);
                }
                $setting->logo = $logoname;
            }
            if ($request->hasFile('coverphoto')) {
                $coverphoto = $request->file('coverphoto');
                $path = public_path('/storage/upload');
                $covername = time() . "." . $coverphoto->getClientOriginalExtension();
                $coverphoto->move($path, $covername);
                if (isset($setting->cover_photo)) {
                    $oldcover = $setting->cover_photo;
                    File::delete($path . '' . $oldcover);
                }
                $setting->cover_photo = $covername;
            }
            $setting->title = $title;
            $setting->email = $email;
            $setting->description = $description;
            $setting->save();
            return back()->with('success', 'Setting updated successfully!');
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
