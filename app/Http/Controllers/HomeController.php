<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Authors;
use App\Genre;
use App\Book;
use App\Genre_book;
use Auth,URL,Session,Redirect,DB,Validator;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    //------ search function (filters books according to search) ---------
    public function index(Request $request)
    {
        if($request->method() == 'POST'){ 
            $searchData       =   $request->all();

            //------- search books by title ----------
            if(@$searchData['titlesubmit'] == 'Search'){
                $data['books'] = Book::WHERE('title', 'like', '%'.$searchData['searchtitle'].'%')->join('authors', 'authors.authorid', '=', 'books.authorid')->join('book_genre', 'book_genre.bookid', '=', 'books.bookid')->join('genre', 'genre.genreid', '=', 'book_genre.genreid')->orderBy('books.bookid')->get();
            }

            //------ search books by author name -------
            elseif(@$searchData['authorsubmit'] == 'Search'){
                $data['books'] = Book::WHERE('books.authorid', $searchData['searchauthor'])->join('authors', 'authors.authorid', '=', 'books.authorid')->join('book_genre', 'book_genre.bookid', '=', 'books.bookid')->join('genre', 'genre.genreid', '=', 'book_genre.genreid')->orderBy('books.bookid')->get();
            }

            //----- search books by genre --------
            elseif(@$searchData['genresubmit'] == 'Search'){
                $data['books'] = Book::WHERE('book_genre.genreid', $searchData['searchgenre'])->join('authors', 'authors.authorid', '=', 'books.authorid')->join('book_genre', 'book_genre.bookid', '=', 'books.bookid')->join('genre', 'genre.genreid', '=', 'book_genre.genreid')->orderBy('books.bookid')->get();
            }

        }

        //------ get all authors and genres for filter dropdown
        $data['authors']       = Authors::all();
        $data['genre']         = Genre::all();

        return view('home', $data);
    }


    //--------- add new book -------------
    public function bookAdd(Request $request) {

    	// ---- form submission of new book
        if($request->method() == 'POST'){ 
            $postData          = $request->all();

            if ($request->hasFile('file')) {
                $file            =  $request->file('file');
                $destinationPath =  base_path() . '/public/pictures/';
                $filename        =  $postData['isbn'].'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath, $filename);
                $data['image']   =  $filename;
            }

            //----- add detail of book genre into book_genre table
            $genredataid        = $postData['genreid'];

            unset($postData['_token']); unset($postData['submit']); unset($postData['file']);unset($postData['genreid']);
            $book               = new Book();
            $genredatabookid = $book->create($postData);

            $genre              = new Genre_book();
            $gName['genreid']   = $genredataid;
            $gName['bookid']    = $genredatabookid->bookid;
            $genre->insert($gName);

            $data['msg']        = 'Successfully added';
        }

        //------ gather author and genre information
        $data['authors']        = Authors::all();
        $data['genre']          = Genre::all();
        return view('book-add', $data);
    }


    //-------- book detail function with update feature-----------
    public function bookDetail(Request $request, $id) {

    	// ------ form submission of update book detail
        if($request->method() == 'POST'){ 
            $postData          = $request->all();

            // ----- get genre information and update genre info.
            $genreData         = Genre_book::where('bookid', $id)->get()->toArray();            
            $genreData         = Genre_book::find($genreData[0]['id']);
            $gName['genreid']  = $postData['genreid'];
            $genreData->update($gName);

            unset($postData['_token']); unset($postData['genreid']);

            //------- update book info and return successfully message
            $bookData          = Book::find($id);
            $bookData->update($postData);
            $data['msg']       = 'Successfully updated';
        }

        //----- gather information of book
        $data['books'] = Book::WHERE('books.bookid', $id)->join('authors', 'authors.authorid', '=', 'books.authorid')->get();

        //----- gather information related genre.
        $data['books_genre']   = Genre_book::where('bookid', $id)->get()->toArray();
                
        //----- gather info regarding author and genre
        $data['authors']       = Authors::all();
        $data['genre']         = Genre::all();
        return view('book-detail', $data);
    }


    // --------- delete book ----------
    public function delete(Request $request, $id) {
        $book   =  Book::find($id);
        $book->delete();
        return redirect('/');
    }
}
