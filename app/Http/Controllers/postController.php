<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function posts() {
        return view('posts');
    }

    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function add_post() {
        return view('post.add_post');
    }

    public function edit_post() {
        return view('post.edit_post');
    }

    public function view_post() {
        return view('post.view_post');
    }

    public function delete_post() {
        //
    }

    //On development function
    public function makeUser() {
        $user = new App\User();
        $user->password = Hash::make('the-password-of-choice');
        $user->email = 'the-email@example.com';
        $user->name = 'My Name';
        $user->save();
    }

}
