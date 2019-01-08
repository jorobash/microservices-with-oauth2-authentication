<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


/*
 * Route for books
 */
$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{book}', 'BookController@show');
$router->put('/books/{book}', 'BookController@update');
$router->patch('/books/{book}', 'BookController@update');
$router->delete('/books/{book}', 'BookController@destroy');

/*
 * Route for the authors
 */
$router->get('/authors', 'AuthorController@index');
$router->post('/authors', 'AuthorController@store');
$router->get('/author/{author}', 'AuthorController@show');
$router->put('/author/{author}', 'AuthorController@update');
$router->patch('/author/{author}', 'AuthorController@update');
$router->delete('/author/{author}', 'AuthorController@destroy');
