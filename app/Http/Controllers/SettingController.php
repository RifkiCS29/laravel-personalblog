<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'owner' => 'required|min:3|max:50',
            'bio' => 'required|max:1000',
            'web_portfolio' => 'required|max:100',
        ]);

        $setting = Setting::find(1); 
        $setting->owner = $request->get('owner');
        $setting->bio = $request->get('bio');
        $setting->web_portfolio = $request->get('web_portfolio');
        $setting->fb = $request->get('fb');
        $setting->twitter = $request->get('twitter');
        $setting->instagram = $request->get('instagram');

        $setting->save();

        return redirect(route('settings.index'))->with(['success' => 'Setting Diperbaharui!']);
    }
}
