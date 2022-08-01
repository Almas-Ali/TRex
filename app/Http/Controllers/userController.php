<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function all_users () {
        $users = User::all();
        return view('backend.user.all_users', compact('users'));
    }
}
