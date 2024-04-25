<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Issue;
use App\Models\ReturnList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $data = Issue::all();

        return view('issueTable', [
            'issues' => $data,
            
        ]);
    }


    public function create(Request $request)
    {
       
        $validated = $request->validate(
            [
                'member_id' => 'required',
                
            ]
        );

      
        $issue_date = date("Y-m-d");
        $return_date = date("Y-m-d", strtotime('+7 days'));
      
        Issue::create([
            'issue_date' => $issue_date,
            'return_date' => $return_date,
            'book_id' => $request->book_id,
           'member_id' => $request->member_id,
            
        ]);

        
        DB::table('books')->where('id', $request->book_id)->update([
            'status' => 0,
       ]);

        return back()->with('message', 'Book is issued');
    }

    public function delete($id)
    {
        $issue = Issue::find($id);

        $returned_date = date("Y-m-d");

       $data = DB::table('return_lists')->insert([
            'returned_date' => $returned_date,
            'issue_date' => $issue->issue_date,
            'return_date' => $issue->return_date,
            'member_id' => $issue->member_id,
            'book_id' => $issue->book_id,
        ]);

        DB::table('books')->where('id', $issue->book_id)->update([
            'status' => 1,
       ]);

       $issue->delete();
        return back()->with('message', 'Book is Returned!');
        

    }

}
