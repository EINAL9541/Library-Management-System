<?php

namespace App\Http\Controllers;

use App\Models\ReturnList;
use Illuminate\Http\Request;

class ReturnListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        $data = ReturnList::all();

        return view('returnTable', [
            'returnLists' => $data
        ]);
    }

    
    public function delete($id)
    {
        $book = ReturnList::find($id)->delete();

        return back()->with('message', 'Return Record is Deleted!');
    }
}
