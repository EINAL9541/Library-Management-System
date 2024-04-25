<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $data = Category::all();

        return view('categoryTable', [
            'categories' => $data
        ]);
    }

    public function createCategoryForm()
    {
        return view('create-category');
    }

    public function create(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
            ]
        );


        
        Category::create([
            'name' => $request->name
        ]);

        return back()->with('message', 'Category name is Added!');
    }

    public function editCategoryForm($id)
    {
        $data = Category::find($id);
        return view('edit-category-form', [
            'category' => $data
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
            ]
        );

        $author = Category::find($id);
        $author->update([
            'name' => $request->name
        ]);

        return back()->with('message', 'Category name is Updated!');
    }

    public function delete($id)
    {
        $author = Category::find($id)->delete();

        return back()->with('message', 'Category name is Deleted!');
        
    }
}


