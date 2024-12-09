<?php

namespace App\Http\Controllers\Backend\Administration;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);

        return view('backend.administrations.settings', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_logo' => 'max:30720',
            'new_favicon' => 'max:30720',
            'new_guest_image' => 'max:30720',
            'new_no_image' => 'max:30720',
            'new_no_profile_image' => 'max:30720'
        ], [
            'new_logo.max' => 'Image must not be greater than 30 MB',
            'new_favicon.max' => 'Image must not be greater than 30 MB',
            'new_guest_image.max' => 'Image must not be greater than 30 MB',
            'new_no_image.max' => 'Image must not be greater than 30 MB',
            'new_no_profile_image.max' => 'Image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $setting = Setting::find(1);

        // Logo
            if($request->file('new_logo')) {
                if($request->old_logo) {
                    Storage::delete('public/backend/common/' . $request->old_logo);
                }

                $new_logo = $request->file('new_logo');
                $logo_name = 'logo.' . $new_logo->getClientOriginalExtension();
                $new_logo->storeAs('public/backend/common', $logo_name);
            }
            else {
                if($setting->logo) {
                    $logo_name = $request->old_logo;
                }
                else {
                    $logo_name = null;
                }
            }
        // Logo

        // Favicon
            if($request->file('new_favicon')) {
                if($request->old_favicon) {
                    Storage::delete('public/backend/common/' . $request->old_favicon);
                }

                $new_favicon = $request->file('new_favicon');
                $favicon_name = 'favicon.' . $new_favicon->getClientOriginalExtension();
                $new_favicon->storeAs('public/backend/common', $favicon_name);
            }
            else {
                if($setting->favicon) {
                    $favicon_name = $request->old_favicon;
                }
                else {
                    $favicon_name = null;
                }
            }
        // Favicon

        // Guest image
            if($request->file('new_guest_image')) {
                if($request->old_guest_image) {
                    Storage::delete('public/backend/common/' . $request->old_guest_image);
                }

                $new_guest_image = $request->file('new_guest_image');
                $guest_image_name = 'guest-image.' . $new_guest_image->getClientOriginalExtension();
                $new_guest_image->storeAs('public/backend/common', $guest_image_name);
            }
            else {
                if($setting->guest_image) {
                    $guest_image_name = $request->old_guest_image;
                }
                else {
                    $guest_image_name = null;
                }
            }
        // Guest image

        // Footer logo
            if($request->file('new_footer_logo')) {
                if($request->old_footer_logo) {
                    Storage::delete('public/backend/common/' . $request->old_footer_logo);
                }

                $new_footer_logo = $request->file('new_footer_logo');
                $footer_logo_name = 'footer-logo.' . $new_footer_logo->getClientOriginalExtension();
                $new_footer_logo->storeAs('public/backend/common', $footer_logo_name);
            }
            else {
                if($setting->footer_logo) {
                    $footer_logo_name = $request->old_footer_logo;
                }
                else {
                    $footer_logo_name = null;
                }
            }
        // Footer logo

        // No image
            if($request->file('new_no_image')) {
                if($request->old_no_image) {
                    Storage::delete('public/backend/common/' . $request->old_no_image);
                }

                $new_no_image = $request->file('new_no_image');
                $no_image_name = 'no-image.' . $new_no_image->getClientOriginalExtension();
                $new_no_image->storeAs('public/backend/common', $no_image_name);
            }
            else {
                if($setting->no_image) {
                    $no_image_name = $request->old_no_image;
                }
                else {
                    $no_image_name = null;
                }
            }
        // No image

        // No profile image
            if($request->file('new_no_profile_image')) {
                if($request->old_no_profile_image) {
                    Storage::delete('public/backend/common/' . $request->old_no_profile_image);
                }

                $new_no_profile_image = $request->file('new_no_profile_image');
                $no_profile_image_name = 'no-profile-image.' . $new_no_profile_image->getClientOriginalExtension();
                $new_no_profile_image->storeAs('public/backend/common', $no_profile_image_name);
            }
            else {
                if($setting->no_profile_image) {
                    $no_profile_image_name = $request->old_no_profile_image;
                }
                else {
                    $no_profile_image_name = null;
                }
            }
        // No profile image

    
        $data = $request->except(
            'old_logo',
            'new_logo',
            'old_favicon',
            'new_favicon',
            'old_guest_image',
            'new_guest_image',
            'old_no_image',
            'new_no_image',
            'old_no_profile_image',
            'new_no_profile_image',
            'old_footer_logo',
            'new_footer_logo'
        );

        $data['logo'] = $logo_name;
        $data['favicon'] = $favicon_name;
        $data['guest_image'] = $guest_image_name;
        $data['no_image'] = $no_image_name;
        $data['no_profile_image'] = $no_profile_image_name;
        $data['footer_logo'] = $footer_logo_name;
        $setting->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}