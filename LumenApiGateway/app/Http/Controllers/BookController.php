<?php

namespace App\Http\Controllers;


use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The base uri to consume the book service
     * @var BookService
     */
    public $bookService;

    /**
     * The base uri to consume the athor service
     * @var AuthorService
     */
    public $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService   = $bookService;
        $this->authorService = $authorService;
    }

    /**
     *return the list of books
     * return Illuminate/Http/Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create one new book
     * @return  Iluminate/Http/Response
     */
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);

        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtain and show one book
     * @return Iluminate/Http/Response
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Update the current book
     * @return Iluminate/Http/Response
     */
    public function update(Request $request,$book)
    {

        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * Remove the current book
     * @return Iluminate/Http/Response
     */
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}