<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $data = Author::all();

        return view('authorTable', [
            'authors' => $data,
        ]);
    }

    public function createAuthorForm()
    {
        return view('create-author');
    }

    public function create(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
            ]
        );


        Author::create([
            'name' => $request->name
        ]);

        return back()->with('message', 'Author name is Added!');
    }

    public function editAuthorForm($id)
    {
        $data = Author::find($id);
        return view('edit-author-form', [
            'author' => $data
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
            ]
        );

        $author = Author::find($id);
        $author->update([
            'name' => $request->name
        ]);

        return back()->with('message', 'Author name is Updated!');
    }

    public function delete($id)
    {
        $author = Author::find($id)->delete();

        return back()->with('message', 'Author name is Deleted!');
        
    }
}
