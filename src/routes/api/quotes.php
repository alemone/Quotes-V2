<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 06.12.2016
 * Time: 00:39
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

$app->group('/api', function () {
    $this->post('/quotes', function (Request $request, Response $response) {
        $data = $request->getParams();
        $data["user"] = $this->user;
        $data["author"] = new AuthorEntity($data["author"]);
        $quote = new QuotesEntity($data);
        $quoteMapper = new QuotesMapper($this->db);
        $quoteMapper->saveQuote($quote);
        return $response->withStatus(201);
    });
});