<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class categoryController extends Controller
{
    public function add_category(Request $request) {
        // $categories = Category::get();
		// return view('category.view_category', compact('categories'));
        
        $request->validate([
			'add_category' => 'min:4|unique:categories'
		]);

		$message        = 'New Category Added Successfully!';
		$category       = new Category;
		$category->name = $request->get('add_category');
		$category->save();

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
		return view('category.view_category', compact('categories'));
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
