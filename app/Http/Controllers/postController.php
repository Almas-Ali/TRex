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
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);

        $post = new Post;
        // Post settings
        $post->title        = $request->get('title');
        $post->slug         = $request->get('slug');
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_select');
        $post->author       = Auth::user()->id;
        // Photo settings
        // $name = $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('uploads'), $name);
        // $path = $request->file('image')->store('/uploads');
        // $post -> name = $name;
        // $post -> path = $path;

        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('uploads'), $newImageName);
        
        $post -> name = $request->file('image')->getClientOriginalName();
        $post -> path = $path;
        
    	$tags = explode(",", $request->tags);
    	$post->tag($tags);
        $post->save();

        $message = "Post Added Successfully!";

        $posts = Post::get();
        return redirect()->route('view_post')->with( ['message' => $message, 'posts' => $posts] );
    }

    public function edit_post(Request $request, $id) {
        $categories = Category::get();
        $post = Post::where('id', $id)->first();
        // $tags = Tag::withAllTags(['Gardening', 'Cooking'])->get();
        // $tags = $post->tags();
        return view('backend.post.edit_post', compact('categories', 'post'));
    }

    public function post_update(Request $request, $id) {
        $post = Post::where('id', $id)->first();
        $post->title        = $request->get('title');
        $post->slug         = $request->get('slug');
        $post->content      = $request->get('content');
        $post->category_id  = $request->get('category_select');
        
        $tags = explode(",", $request->tags);
    	$post->retag($tags);
        $post->update();

        $message = "Post Updated Successfully!";

        $posts = Post::get();
        return redirect()->route('view_post')->with( ['message' => $message, 'posts' => $posts] );
    }

    public function view_post() {
        $posts = Post::get();
        return view('backend.post.view_post', compact('posts'));
    }

    public function delete_post(Request $request, $id) {
        
        $post = Post::where('id', $id)->first();
        $post->delete();
        $message = "Post Deleted Successfully!";

        $posts = Post::get();
        return redirect()->route('view_post')->with( ['message' => $message, 'posts' => $posts] );
    }

    public function dashboard() {
        $total_posts        = Post::all()->count();
        $total_categories   = Category::all()->count();
        return view('backend.dashboard', compact('total_posts', 'total_categories'));
    }
    
    // public function upload(Request $request) {
        
    //     $validatedData = $request->validate([
    //      'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);
    //     $name = $request->file('image')->getClientOriginalName();
    //     $path = $request->file('image')->store('public/uploads');
    //     $save = new Image;
    //     $save->name = $name;
    //     $save->path = $path;
    //     $save->save();
    //     return redirect('image')->with('status', 'Image Has been uploaded successfully with validation in laravel');
    // }
    //   $path = $request->file('image')->store('public/uploads');
}
