<h2>Versions</h2>
[
    Laravel Version = Laravel Framework 8.38.0,
    PHP Version = PHP 7.3.12,
]
<hr>
<h2>How to run</h2>

<strong>Download repository and install dependences via composer</strong>
    -git clone https://github.com/CamiloMalaver/metaBiblioTest.git,
    -composer install
<strong>Run application</strong>
    -php artisan serve

<h2>Avaible routes</h2>
    <strong>-post</strong>('books/create/{isbn}'(Creates a new book giving isbn),
    <strong>-post</strong>('books/delete/{isbn}(Deletes a book giving the isbn)',
    <strong>-get</strong>('books'(Lists all books),
    <strong>-get</strong>('books/{isbn}(Returns a book giving isbn)'
