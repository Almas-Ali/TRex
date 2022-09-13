<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settings;
use App\Models\SocialLinks;

class settingsController extends Controller
{
    public function general() {
        $settings = Settings::orderBy('updated_at', 'desc')->first();
        // desc/asc
        return view('backend.settings.general', compact('settings'));
    }

    public function save_general(Request $request) {
        $settings_old = Settings::orderBy('updated_at', 'desc')->first();
        if (
            $settings_old->site_name == $request->get('site_name') &&
            $settings_old->site_slogan == $request->get('site_slogan') &&
            $settings_old->site_author_name == $request->get('site_author_name') &&
            $settings_old->site_author_email == $request->get('site_author_email')
        ) {
            $message = 'Settings already exist!';
            $type = 'warning';
        } else {
            $settings = new Settings;
            $settings -> site_name          = $request->get('site_name');
            $settings -> site_slogan        = $request->get('site_slogan');
            $settings -> site_author_name   = $request->get('site_author_name');
            $settings -> site_author_email  = $request->get('site_author_email');
            $settings->save();
            $message = 'Settings updated!';
            $type = 'success';
        }
        return redirect()->route('general_settings')->with( ['message' => $message, 'settings' => $settings_old, 'type' => $type] );
    }

    public function social_settings() {
        $social = SocialLinks::orderBy('updated_at', 'desc')->first();
        return view('backend.settings.social', compact('social'));
    }

    public function save_social(Request $request) {
        $social_old = SocialLinks::orderBy('updated_at', 'desc')->first();
        if (
            $social_old->phone == $request->get('phone') &&
            $social_old->facebook == $request->get('facebook') &&
            $social_old->instagram == $request->get('instagram') &&
            $social_old->twitter == $request->get('twitter') &&
            $social_old->linkedin == $request->get('linkedin')
        ) {
            $message = 'Settings already exist!';
            $type = 'warning';
        } else {
            $social = new SocialLinks;
            $social -> phone     = $request->get('phone');
            $social -> facebook  = $request->get('facebook');
            $social -> instagram = $request->get('instagram');
            $social -> twitter   = $request->get('twitter');
            $social -> linkedin  = $request->get('linkedin');
            $social->save();
            $message = 'Settings updated!';
            $type = 'success';
        }
        return redirect()->route('social_settings')->with( ['message' => $message, 'social' => $social_old, 'type' => $type] );
    }
}
