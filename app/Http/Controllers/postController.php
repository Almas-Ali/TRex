<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Auth;
use Conner\Tagging\Model\Tag;

class postController extends Controller
{
    public function resize_calc($height, $width) {
        if ($height >= 1920 && $width >= 1080) {
            (int)$height = $height / 6;
            (int)$width = $width / 6;
        } elseif ($height >= 1024 && $width >= 720) {
            (int)$height = $height / 4;
            (int)$width = $width / 4;
        } elseif ($height >= 600 && $width >= 360) {
            (int)$height = $height / 3;
            (int)$width = $width / 3;
        }

        return [$height, $width];
    }

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
        if (!is_null($first_news)){
            $all_news  = Post::all()->except($first_news->id);
        } else {
            $all_news  = null;
        }
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
        $post->category     = $request->get('category_select');
        $post->user         = Auth::user()->id;
        // Photo settings
        // $name = $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('uploads'), $name);
        // $path = $request->file('image')->store('/uploads');
        // $post -> photo_name = $name;
        // $post -> photo_path = $path;

        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('uploads/posts/'), $newImageName);
        
        $post -> photo_name = $request->file('image')->getClientOriginalName();
        $post -> photo_path = "/uploads/posts/".$newImageName;

        $img = \Image::make(public_path('uploads/posts/').$newImageName);
        // $size = $this->resize_calc( $img->height(), $img->width() );
        // $img -> resize($size[0], $size[1]);
        // return dd($size);
        $img->save(public_path('uploads/posts/').$newImageName, 30);
        
        $post->save();
    	$tags = explode(",", $request->tags_arr);
    	$post->tag($tags);

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
        $post->category     = $request->get('category_select');

        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('uploads/posts/'), $newImageName);
        
        $img = \Image::make(public_path('uploads/posts/').$newImageName);
        // $size = $this->resize_calc( $img->height(), $img->width() );
        // $img -> resize($size[1], $size[0]);
        // return dd($size);
        $img->save(public_path('uploads/posts/').$newImageName, 30);
        
        $post -> photo_name = $request->file('image')->getClientOriginalName();
        $post -> photo_path = "/uploads/posts/".$newImageName;
        
        $tags = explode(",", $request->tags_arr);
        // return dd($tags);
        // $tags = str_replace('"', '', $request->tags);
        // $old_tags = $post->tags;
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

    public function privacy_policy () {
        return view('frontend.privacy_policy');
    }

}
