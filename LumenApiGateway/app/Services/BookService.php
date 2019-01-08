<?php

namespace App\Services;


use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Obtain the full list of books from the author service
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET','/books');
    }

    /**
     * Create one author using the book service
     * @return string
     */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtain a single book from the service
     */

    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}" );
    }

    /**
     * Update an instance of aurhtor using the author service
     * @param $data
     * @param $author
     * @return string
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /**
     * Remove a single book using the author service
     * @return string
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}