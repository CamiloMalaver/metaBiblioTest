<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BooksAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('books_isbn');
            $table->unsignedBigInteger('authors_id');
            
            $table->foreign('books_isbn')->references('isbn')->on('books')->onDelete('cascade');
            $table->foreign('authors_id')->references('id')->on('authors');
            $table->unique(['books_isbn', 'authors_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
