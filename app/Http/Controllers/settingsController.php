<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settings;

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
            // $cls = 'danger';
        } else {
            $settings = new Settings;
            $settings -> site_name          = $request->get('site_name');
            $settings -> site_slogan        = $request->get('site_slogan');
            $settings -> site_author_name   = $request->get('site_author_name');
            $settings -> site_author_email  = $request->get('site_author_email');
            $settings->save();
            $message = 'Settings updated!';
            // $cls = 'success';
        }
        return redirect()->route('general_settings')->with( ['message' => $message, 'settings' => $settings_old] );
    }
}
