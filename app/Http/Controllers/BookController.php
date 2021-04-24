<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Authors;
use App\Models\Book_Authors;
use Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $isbnKey = 'ISBN:'.$request->isbn;
            $response = Http::get(str_replace('_ISBN_',$isbnKey,env('API_URL_BASE')));
            if(isset($response[$isbnKey])){
                if(!Books::where('isbn', $request->isbn)->exists()){
                    $remoteBookData = $response[$isbnKey]; 
                    $newBook = new Books;
                    $book_Cover = isset($remoteBookData['cover']['large']) ? $remoteBookData['cover']['large'] : null;
                    $newBook->create($request->isbn, $remoteBookData['title'], $book_Cover);
                    $newBook->save();
                    
                    foreach($remoteBookData['authors'] as $authorData){
                        $author = Authors::firstOrCreate(
                            ['name' => $authorData['name']]
                        );

                        $author->save();
                        $book_author = new Book_Authors($request->isbn, $author->id);
                        $book_author->save();
                    }     
                    return json_encode([['Status'=>'Record saved.']]);
                }else{
                    return json_encode([['Status'=>'Record already exists.']]);
                }                  
                

            }else{
                return json_encode([['Status'=>'Resource not found.']]);
            }
        }catch(Excepcion $e){
            
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
