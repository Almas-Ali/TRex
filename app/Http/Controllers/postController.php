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

    public function makePost() {
        //
    }

    public function editPost() {
        //
    }

    public function readPost() {
        //
    }

    public function deletePost() {
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
