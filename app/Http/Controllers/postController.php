<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Auth;
use Conner\Tagging\Model\Tag;

class postController extends Controller
{
    public function posts(Request $request, $slug) {
        $post        = Post::where('slug', $slug)->first();
        $tags        = Tag::all();
        $categories  = Category::all();
        return view('frontend.posts', compact('post','tags', 'categories'));
    }

    public function index() {
        $posts       = Post::all();
        $tags        = Tag::all();
        $categories  = Category::all();
        $first_news  = Post::first();
        $all_news  = Post::all()->except(1);
        return view('frontend.index', compact('posts', 'tags', 'categories', 'first_news', 'all_news'));
    }

    public function about() {
        return view('frontend.about');
    }

    public function add_post() {
        $categories = Category::get();
        return view('backend.post.add_post', compact('categories'));
    }
    
    public function create_post(Request $request) {

        $post = new Post;
        $post->title        = $request->get('title');
        $post->slug         = $request->get('slug');
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_select');
        $post->author       = Auth::user()->id;
        $post->save();
        
    	$tags = explode(",", $request->tags);
    	$post->tag($tags);

        $message = "Post Added Successfully!";

        $posts = Post::get();
        return redirect()->route('view_post')->with( ['message' => $message, 'posts' => $posts] );
    }

    public function edit_post(Request $request, $id) {
        $categories = Category::get();
        $post = Post::where('id', $id)->first();
        // $tags = Tag::withAllTags(['Gardening', 'Cooking'])->get();
        return view('backend.post.edit_post', compact('categories', 'post'));
    }

    public function view_post() {
        $posts = Post::get();
        return view('backend.post.view_post', compact('posts'));
    }

    public function delete_post() {
        //
    }

    public function dashboard() {
        return view('backend.dashboard');
    }

}
