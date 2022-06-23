<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Auth;

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
        $categories = Category::get();
        return view('post.add_post', compact('categories'));
    }
    
    public function create_post(Request $request) {
        // return view('post.add_post');
        $post = new Post;
        $post->title        = $request->get('title');
        $post->slug         = $request->get('slug');
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_select');
        $post->author       = Auth::user()->id;
        $post->save();
        $message = "Post Added Successfully!";

        $posts = Post::get();
        return redirect()->route('view_post')->with( ['message' => $message, 'posts' => $posts] );
    }

    public function edit_post() {
        return view('post.edit_post');
    }

    public function view_post() {
        $posts = Post::get();
        return view('post.view_post', compact('posts'));
    }

    public function delete_post() {
        //
    }

}
