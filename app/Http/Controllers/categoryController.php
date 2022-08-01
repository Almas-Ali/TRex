<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

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
			'category_name' => ['min:4', 'max:50', 'unique:categories', 'required'],
            'category_slug' => ['min:4', 'max:50', 'unique:categories', 'required'],
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
			'edit_category' => 'min:4|unique:categories'
		]);

        // $category = Category::get($id)->first();
        
        $message        = 'Category Updated Successfully!';
		$category       = Category::findOrFail($id);
		$category->name = $request->get('edit_category_'.$id);
		$category->update();

        $categories = Category::get();
		return redirect()->route('view_category')->with( ['message' => $message, 'categories' => $categories] );

    }

    public function view_category() {
        $categories = Category::get();
		return view('backend.category.view_category', compact('categories'));
    }

    public function delete_category(Request $request, $id) {
        $category = Category::findOrFail($id);
		$category->delete();
		$message = 'Deleted Successfully!';

        $categories = Category::get();
		// return view('category.view_category', compact('message', 'categories'));
        return redirect()->route('view_category')->with( ['message' => $message, 'categories' => $categories] );
    }
}
