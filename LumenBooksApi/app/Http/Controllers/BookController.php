<?php

namespace App\Http\Controllers;


use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    public function __construct()
    {

    }

    /**
     *return the list of books
     * return Illuminate/Http/Response
     */
    public function index()
    {
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * Create one new book
     * @return  Iluminate/Http/Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $books = Book::create($request->all());

        return $this->successResponse($books, Response::HTTP_CREATED);
    }

    /**
     * Obtain and show one book
     * @return Iluminate/Http/Response
     */
    public function show($book)
    {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * Update the current book
     * @return Iluminate/Http/Response
     */
    public function update(Request $request,$book)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if($book->isClean()){
            return $this->errorResponse('At least one value must be change',
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Remove the current book
     * @return Iluminate/Http/Response
     */
    public function destroy($book)
    {
        $book= Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);

    }

}