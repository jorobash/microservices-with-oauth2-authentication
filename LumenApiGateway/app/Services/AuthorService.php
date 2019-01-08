<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class AuthorService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Obtain the full list of authors from the author service
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET','/authors');
    }

    /**
     * Create one author using the author service
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Obtain a single author from the author service
     */

    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}" );
    }

    /**
     * Update an instance of aurhtor using the author service
     * @param $data
     * @param $author
     * @return string
     */
    public function editAuthor($data, $author)
    {
        return $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /**
     * Remove a single author using the author service
     * @return string
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
}