<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Issue;
use App\Models\Member;
use App\Models\ReturnList;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');

        $data1 = Member::count();
        $data2 = Book::count();
        $data3 = Issue::where('issue_date', $today)->count();
        
        
        $data4 = ReturnList::where('returned_date', $today)->count();
     
  
        return view('dashboard',[
            'member' => $data1,
            'book' => $data2,
            'issue' => $data3,
            'returnlist' => $data4,
        ]);
    }
}
