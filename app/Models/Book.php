<?php

namespace App\Models;

use App\Models\Author;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'name',
        'image',
        'review',
        'author_id',
        'category_id'
    ];
}
