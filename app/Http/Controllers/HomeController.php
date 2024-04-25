<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
       public function __construct()
{
 $this->middleware('auth')->except(['index', 'detail', 'home', 'logoutPost']);
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        // dd($_SESSION);   
        
        
         
        $data2 = Author::all();
        $data3 = Issue::all();
      
       
        if ($id == 'all') {
            $data = Book::all();
        } 
        else {
       
            $author = author::find(request()->id);
            $data = $author->books;

        }
        return view('list', [
            'books' => $data,
            'authors' => $data2,
            'issues' => $data3,
        ]);

        
    }

    public function detail($id)
    {
        $data = Book::find($id);
        return view('detail', [
            'book' => $data
        ]);
    }

    public function search(Request $request ){
        $data3 = Issue::all();
            $searchQuery = $request->input('query');
            $books = Book::where('name', 'LIKE', "%$searchQuery%") 
                         ->get();
            
                         $data2 = Author::all();
            return view("list", ['books' => $books,
            'authors' => $data2,
            'issues' => $data3,
            
            ] );
        
    }

    public function logoutPost()
    {

        session_destroy();
        return redirect("/list/all");
    }
}
