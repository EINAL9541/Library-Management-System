<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        
        
        $data = Book::all();
        $data1 = Member::all();

        return view('bookTable', [
            'books' => $data,
            'members' => $data1
        ]);
    }

    public function createBookForm()
    {
        $data1 = Category::all();
        $data2 = Author::all();
        return view('create-book', [
            'categories' => $data1,
            'authors' => $data2
        ]);
    }

    public function create(Request $request)
    {



        $validated = $request->validate(
            [
                'name' => 'required',
            
                'image' => ['required', 'image'],

                'category' => 'required',
                'author' => 'required',
                'review' => 'required',
            ]
        );

        $path =  $request->file('image')->store('images', 'public');

        Book::create([
            'name' => $request->name,
        
            'image' => $path,
            'review' => $request->review,
            'category_id' => $request->category,
            'author_id' => $request->author
        ]);

        return back()->with('message', 'new book is Added!');
    }

    public function editBookForm($id)
    {
        $data1 = Category::all();
        $data2 = Author::all();
        $data = Book::find($id);
        return view('edit-book-form', [
            'book' => $data,
            'categories' => $data1,
            'authors' => $data2
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
             
                'image' =>  'image',
                'category' => 'required',
                'author' => 'required',
                'review' => 'required',
            ]
        );

        $book = Book::find($id);
       
        $path =  $request->file('image')->store('images', 'public');

        if ($oldImage = $book->image) {
            Storage::disk('public')->delete($oldImage);
        }

        $book->update([
            'name' => $request->name,
        
            'image' => $path,
            'review' => $request->review,
            'category_id' => $request->category,
            'author_id' => $request->author
        ]);

       

        return back()->with('message', 'Book is Updated!');
    }

    public function delete($id)
    {
        $book = Book::find($id)->delete();

        return back()->with('message', 'Book is Deleted!');
    }
}
