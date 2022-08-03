<?php
/*
* This is helper file for this project.
* Md. Almas Ali
* 
*/

// if (!function_exists("almas")) {
//     function almas($str) 
//     {
//         Str::limit(strip_tags($str), 50);
//     }
// }

use App\Models\User;
use App\Models\settings;
use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;

if (!function_exists("website")) {
    function website() {
        $settings = Settings::orderBy('updated_at', 'desc')->first();
    	if (!is_null($settings)) {
        	return $settings;
    	}
    	return [
    			'site_name' 		=> 'TRex',
    			'site_slogan' 		=> 'Don\'t work hard, work smart!',
    			'site_author_name' 	=> 'TRex',
    			'site_author_email' => 'support@trex.com'
    		];
    	
    }
}


if (!function_exists("dateHuman")) {
    function dateHuman($date) {
        $carbonated_date = Carbon::parse($date);
        $diff_date = $carbonated_date->diffForHumans(Carbon::now());
        return $diff_date;
    }
}

if (!function_exists("getUser")) {
    function getUser($id) {
        $user = User::find($id);
		return $user;
    }
}

if (!function_exists("getAllCategories")) {
    function getAllCategories() {
        $categories = Category::all();
		return $categories;
    }
}

if (!function_exists("getCommentCount")) {
    function getCommentCount($id) {
        $comment = Comment::find($id)->count();
		return $comment;
    }
}


// 'website_name' => env('WEBSITE_NAME', 'CNPI Blog'),
// 'website_author' => env('WEBSITE_AUTHOR', 'Md. Almas Ali'),