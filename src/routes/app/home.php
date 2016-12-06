<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 05.12.2016
 * Time: 19:42
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;


$app->get('/home', function (Request $request, Response $response) {
    /** @var \Spot\Locator $spot */
    $quotesMapper = new QuotesMapper($this->db);
    $quotes = $quotesMapper->getQuotes();
    return $this->view->render($response, 'home.html.twig', [
        "quotes" => $quotes
    ]);
})->setName("home");