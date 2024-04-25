<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnList extends Model
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
        'returned_date',
        'book_id',
        'member_id'
    ];

}
