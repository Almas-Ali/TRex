<?php
/*
* This is helper file for this project.
* Md. Almas Ali
* 
*/

use App\Models\User;
use App\Models\settings;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\SocialLinks;
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
        $user = User::where('id', $id)->first();
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
        $comment = Comment::where('post', $id)->count();
		return $comment;
    }
}

if (!function_exists("getMetaTags")) {
    function getMetaTags($id) {
        $post = Post::where('id', $id)->first();
        $tags = array();
        foreach($post->tags as $tag) {
            array_push($tags, $tag->name);
        }
        $keywords = implode(",",$tags);
		return $keywords;
    }
}

if (!function_exists("getSocial")) {
    function getSocial() {
        return SocialLinks::orderBy('updated_at', 'desc')->first();
    }
}

if (!function_exists("postCountCategory")) {
    function postCountCategory($id) {
        $post = Post::where('category', $id)->count();
        return $post;
    }
}

// post views count 
if (!function_exists("postViewCount")) {
    function postViewCount($id) {
        $post = Post::where('id', $id)->first();
        return views($post)->unique()->count();
    }
}

// 'website_name' => env('WEBSITE_NAME', 'CNPI Blog'),
// 'website_author' => env('WEBSITE_AUTHOR', 'Md. Almas Ali'),