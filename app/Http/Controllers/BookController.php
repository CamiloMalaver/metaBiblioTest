<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Authors;
use App\Models\Book_Authors;
use App\Http\Resources\BookCollection;
use SimpleXMLElement;
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
        return new BookCollection(Books::paginate(2));
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
                    return json_encode([['Result'=>'Record saved.']]);
                }else{
                    return json_encode([['Result'=>'Record already exists.']]); 
                }                  
                

            }else{
                return json_encode([['Result'=>'Resource not found.']]);
            }
        }catch(Excepcion $e){
            
        }
        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {

        if(Books::where('isbn', $isbn)->exists()){
            $result = Books::find($isbn)->load('authors');            
            return $result;
        }else{
            return json_encode([['Result'=>'Book not found.']]);
        }
        
        //$authors = $result->authors;
        
        // This function create a xml object with element root.
        //$xml = new SimpleXMLElement('<root/>');

        // This function resursively added element
        // of array to xml document
        //array_walk_recursive((array)$result, array ($xml, 'addChild'));

        // This function prints xml document.
        //print $xml->asXML();

        
       
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        if(Books::where('isbn', $isbn)->exists()){
            $victim = Books::where('isbn',$isbn)->first();
            $result = $victim->title;
            Books::where('isbn',$isbn)->delete();
            return json_encode([['Result'=>$result.' deleted']]);
        }else{
            return json_encode([['Result'=>'Book not found.']]);
        }
    }
}
