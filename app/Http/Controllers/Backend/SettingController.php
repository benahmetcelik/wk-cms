<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){



        $settings = Setting::groupBy('setting_group')->get();


        $settings = $settings->map(function ($item) use ($settings){

            $item->subSettings = $settings->where('setting_group', $item->setting_group)->count();
            return $item;

        });


        return view('backend.setting.index', compact('settings'));
    }

    public function group($group){

        $groups = Setting::where('setting_group', $group)->get();


        return view('backend.setting.group', compact('groups', 'group'));
    }

    public function store(Request $request){
        $request->validate([
            'setting_group' => 'required',
            'setting_key' => 'required',
            'setting_value' => 'required',
        ]);

        $setting = Setting::create($request->all());

        return redirect()->route('backend.setting.index')->with('success', 'Setting created successfully.');
    }


    public function update(Request $request){

        foreach ($request->post('setting') as $key => $value){
            Setting::findOrFail($key)->update(['setting_value' => $value]);
        }

        return redirect()->back()->with('success', 'Setting updated successfully.');
    }

    public function destroy(Setting $setting){
        $setting->delete();

        return redirect()->route('backend.setting.index')->with('success', 'Setting deleted successfully.');
    }


}
