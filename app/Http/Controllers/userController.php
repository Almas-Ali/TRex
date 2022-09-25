<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;


class userController extends Controller
{
    public function all_users () {
        $users = User::all();
        return view('backend.user.all_users', compact('users'));
    }

    public function user_dashboard () {
        if (Auth::user()->is_admin == 0) {
            return view('backend.user.user_dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function user_profile () {
        $user = Auth::user();
        $posts = count(Post::all()->where('author', $user->id));
        return view('backend.user.profile.profile', compact('user', 'posts'));
    }

    public function user_profile_update () {
        // $id = Auth::user()->id;
        $user = Auth::user();
        return view('backend.user.profile.profile_update', compact('user'));
    }

    public function user_profile_settings () {
        // $id = Auth::user()->id;
        $user = Auth::user();
        return view('backend.user.profile.profile_settings', compact('user'));
    }

    public function user_change_password () {
        return view('backend.user.profile.change_password');
    }
}
