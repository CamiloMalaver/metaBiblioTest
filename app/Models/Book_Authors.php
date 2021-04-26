<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Authors extends Model
{
    use HasFactory;
    protected $table = 'book_author';
    public $timestamps = false;

    function __construct($book_isbn, $author_id){
        $this->books_isbn = $book_isbn;
        $this->authors_id = $author_id;
    }
}
