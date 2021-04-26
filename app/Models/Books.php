<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'isbn';
    public $timestamps = false;
    public $incrementing = false;


    function create($isbn, $title, $cover){        
        $this->isbn = $isbn;
        $this->title = $title;
        $this->cover = $cover;
    }

    function authors() {
        return $this->belongsToMany(Authors::class, 'book_author');
    }

}
