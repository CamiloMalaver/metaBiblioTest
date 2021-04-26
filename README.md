<h2>Versions</h2>
[
    Laravel Version = Laravel Framework 8.38.0,<br>
    PHP Version = PHP 7.3.12,
]
<hr>
<h2>How to run</h2>

<strong>Download repository and install dependences via composer</strong><br>
    -git clone https://github.com/CamiloMalaver/metaBiblioTest.git,<br>
    -composer install<br>
<strong>Run application</strong><br>
    -php artisan serve<br>
<hr>
<h2>Avaible routes</h2>
    <strong>-post</strong>('books/create/{isbn}'(Creates a new book giving isbn),<br>
    <strong>-post</strong>('books/delete/{isbn}(Deletes a book giving the isbn)',<br>
    <strong>-get</strong>('books'(Lists all books),<br>
    <strong>-get</strong>('books/{isbn}(Returns a book giving isbn)'
