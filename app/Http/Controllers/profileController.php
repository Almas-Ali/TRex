<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;

class profileController extends Controller
{
    public function profile () {
        $user = Auth::user();
        $posts = count(Post::all()->where('author', $user->id));
        return view('backend.profile.profile', compact('user', 'posts'));
    }

    public function profile_settings () {
        // $id = Auth::user()->id;
        $user = Auth::user();
        return view('backend.profile.profile_settings', compact('user'));
    }

    public function update_profile(Request $request) {
        // $id = Auth::user()->id;
        // $user = User::where($id);
        $user = Auth::user();
        $user->name  = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');

        $image_name = $request->file('user_image')->getClientOriginalName();
        $newImageName = time() . '-' . $image_name;
        $path = $request->file('user_image')->move(public_path('uploads/user'), $newImageName);
        
        $user -> photo_name = $image_name;
        $user -> photo_path = "/uploads/user/".$newImageName;
        
        $user->save();
        return redirect()->back()->with(['message' => 'Successfully updated!']);
    }
}
