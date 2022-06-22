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
			'name' => 'min:4|unique:categories'
		]);
		$message = 'New category added!';
		$category = new Category;
		$category->name = $request->get('add_category');
		$category->save();

        $categories = Category::get();
        return view('category.view_category', compact('message', 'categories'));
    }

    public function edit_category() {
        // $categories = Category::get();
		// return view('category.view_category', compact('categories'));
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
		return view('category.view_category', compact('message', 'categories'));
    }
}
