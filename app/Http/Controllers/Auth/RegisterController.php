<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required'],
            'username' => ['required', 'string', 'min:4', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // if ($data['gender'] == "male") {
        //     $photo_name = 'male';
        //     $photo_path = '/img/male.png';
        // } else if ($data['gender'] == "female") {
        //     $photo_name = 'female';
        //     $photo_path = '/img/female.png';
        // } else {
        //     $photo_name = 'other';
        //     $photo_path = '/img/other.png';
        // }
        // $bar = ($foo == 1) ? "1" : (($foo == 2)  ? "2" : "other");
        // $photo_path = ($data['gender'] == 'male') ? '/img/male.png' : (($data['gender'] == 'female') ? '/img/female.png' : '/img/other.png');
        // $photo_name = ($data['gender'] == 'male') ? 'male' : (($data['gender'] == 'female') ? 'female' : 'other');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'gender' => $data['gender'],
            'photo_name' => ($data['gender'] == 'male') ? 'male' : (($data['gender'] == 'female') ? 'female' : 'other'),
            'photo_path' => ($data['gender'] == 'male') ? '/img/male.png' : (($data['gender'] == 'female') ? '/img/female.png' : '/img/other.png'),
            'password' => Hash::make($data['password']),
        ]);
    }
}
