<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Conner\Tagging\Model\Tag;

class categoryController extends Controller
{
    public function list_category () {

        $categories = Category::all();
        return view('frontend.categories', compact('categories'));
    }

    public function add_category(Request $request) {
        // $categories = Category::get();
		// return view('category.view_category', compact('categories'));
        
        $request->validate([
			'category_name' => ['min:4', 'max:50', 'unique:categories,name', 'required'],
            'category_slug' => ['min:4', 'max:50', 'unique:categories,slug', 'required'],
            'category_dsc'  => ['min:4', 'max:50', 'required'],
		]);

		$category               = new Category;
		$category->name         = $request->get('category_name');
		$category->slug         = $request->get('category_slug');
		$category->description  = $request->get('category_dsc');
		$category->save();
		
        $message = 'New Category Added Successfully!';
        
        $categories = Category::get();
        // return view('category.view_category', compact('message', 'categories'));
        return redirect()->route('view_category')->with( ['message' => $message, 'categories' => $categories] );
    }

    public function edit_category(Request $request, $id) {
        $request->validate([
			'edit_category_name_'.$id => ['min:4', 'max:50', 'unique:categories,name', 'required'],
            'edit_category_slug_'.$id => ['min:4', 'max:50', 'unique:categories,slug', 'required'],
            'edit_category_dsc_'.$id  => ['min:4', 'max:50', 'required'],
		]);

        // $category = Category::get($id)->first();
        
        $message = 'Category Updated Successfully!';
		$category              = Category::where('id', $id)->first();
		$category->name        = $request->get('edit_category_name_'.$id);
		$category->slug        = $request->get('edit_category_slug_'.$id);
		$category->description = $request->get('edit_category_dsc_'.$id);
		$category->update();

        $categories = Category::get();
		return redirect()->route('view_category')->with( ['message' => $message, 'categories' => $categories] );

    }

    public function view_category() {
        $categories = Category::get();
		return view('backend.category.view_category', compact('categories'));
    }

    public function delete_category(Request $request, $id) {
        $category = Category::findOrFail('id', $id);
		$category->delete();
		$message = 'Deleted Successfully!';

        $categories = Category::get();
		// return view('category.view_category', compact('message', 'categories'));
        return redirect()->route('view_category')->with( ['message' => $message, 'categories' => $categories] );
    }

    public function single_category (Request $request, $slug) {
        $category = Category::where('slug', $slug)->first();
        return view('frontend.single_category', compact('category'));
    }

    public function single_tag (Request $request, $slug) {
        $tag = Tag::where('slug', $slug)->first();
        return view('frontend.single_tag', compact('tag'));
    }
}
