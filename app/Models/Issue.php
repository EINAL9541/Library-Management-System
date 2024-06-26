<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    protected $fillable = [
        'issue_date',
        'return_date',
        'book_id',
        'member_id'
    ];

}
