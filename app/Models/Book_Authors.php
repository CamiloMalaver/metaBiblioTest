<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Authors extends Model
{
    use HasFactory;
    protected $table = 'books_authors';
    public $timestamps = false;

    function __construct($book_id, $author_id){
        $this->book_id = $book_id;
        $this->author_id = $author_id;
    }
}
