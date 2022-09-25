<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;
use Image;

class profileController extends Controller
{
    public function profile () {
        $user = Auth::user();
        $posts = count(Post::all()->where('author', $user->id));
        return view('backend.profile.profile', compact('user', 'posts'));
    }

    public function profile_settings () {
        return view('backend.profile.profile_settings');
    }

    public function profile_update () {
        // $id = Auth::user()->id;
        $user = Auth::user();
        return view('backend.profile.profile_update', compact('user'));
    }

    public function profile_update_save(Request $request) {
        // $id = Auth::user()->id;
        // $user = User::where($id);
        $user = Auth::user();
        $user->name  = $request->get('name');
        $user->email = $request->get('email');
        // $user->username = $request->get('username');
        $image_name = $request->file('user_image');
        
        if($image_name) {
            $fileSize = $image_name->getSize()/1024;
            // return dd($fileSize);
            if ($fileSize > 1024) {
                return redirect()->back()->with(['message'=> 'Image size is too large. Please upload image less than 1MB', 'message_type' => 'danger']);
            }

            $image_name = $image_name->getClientOriginalName();
            $newImageName = time() . '-' . $image_name;
            
            $path = $request->file('user_image')->move(public_path('uploads/user'), $newImageName);
            $img = \Image::make(public_path('uploads/user/').$newImageName)->resize(120, 120);
            $img->save(public_path('uploads/user/').$newImageName, 70);
            
            $user -> photo_name = $image_name;
            $user -> photo_path = "/uploads/user/".$newImageName;
        }
        $user->save();
        
        return redirect()->back()->with(['message' => 'Successfully updated!', 'message_type' => 'success']);
    }

    public function change_password () {
        return view('backend.profile.change_password');
    }
    
    public function change_password_save () {
        return redirect()->back()->with(['message' => 'Function is not ready yet!', 'message_type' => 'danger']);
    }
}
