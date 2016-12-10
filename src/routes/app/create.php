<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 05.12.2016
 * Time: 19:41
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

$app->group('/create', function () {
    $this->get('/quotes', function (Request $request, Response $response) {
        $authorMapper = new AuthorMapper($this->db);
        return $this->view->render($response, 'createQuote.html.twig', [
            "authors" => $authorMapper->getAuthors()
        ]);
    })->setName('createQuotes');
    $this->get('/authors', function (Request $request, Response $response) {
        return $this->view->render($response, 'createAuthor.html.twig');
    })->setName('createAuthors');
});