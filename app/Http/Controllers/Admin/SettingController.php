<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting  = setting('general_settings') ?? NULL;
        return view('admin.settings.general_setting', compact('setting'));
    }

    public function store(Request $request)
    {
        $setting    = !empty(setting('general_settings')) ? setting('general_settings')->option_value : NULL;
        $option_value = array(
            'app_name'              => $request->input('app_name'),
            'support_email'         => $request->input('support_email'),
            'support_phone'         => $request->input('support_phone'),
            'company_address'       => $request->input('company_address'),

            // banner section
            'banner_heading'        => $request->input('banner_heading'),
            'banner_subheading'     => $request->input('banner_subheading'),
            'banner_description'    => $request->input('banner_description'),
            'banner_action_name1'   => $request->input('banner_action_name1'),
            'banner_action_name2'   => $request->input('banner_action_name2'),
            'banner_action_url1'    => $request->input('banner_action_url1'),
            'banner_action_url2'    => $request->input('banner_action_url2'),
            'banner_text'           => $request->input('banner_text'),


            'meta_title'            => $request->input('meta_title'),
            'meta_keyword'          => $request->input('meta_keyword'),
            'meta_description'      => $request->input('meta_description'),
        );


        if ($request->hasFile('logo')) {
            $option_value['logo'] = $request->file('logo')->store('uploads/logo', 'public');
        } else {
            $option_value['logo'] = $setting['logo'] ?? NULL;
        }

        if ($request->hasFile('favicon')) {
            $option_value['favicon'] = $request->file('favicon')->store('uploads/logo', 'public');
        } else {
            $option_value['favicon'] = $setting['favicon'] ?? NULL;
        }

        if ($request->hasFile('banner')) {
            $option_value['banner'] = $request->file('banner')->store('uploads/banner', 'public');
        } else {
            $option_value['banner'] = $setting['banner'] ?? NULL;
        }
        // return $option_value;

        Setting::updateOrCreate(['id' => $request->input('RecordId')], [
            'option_key'   => 'general_settings',
            'option_value' => $option_value
        ]);

        return back()->withSuccess('SUCCESS !! Setting is successfully updated');
    }
}
