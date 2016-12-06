<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 05.12.2016
 * Time: 19:42
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;


$app->get('/home/{page:[0-9]+}', function (Request $request, Response $response, array $args) {
    /** @var \Spot\Locator $spot */
    $page = $args["page"];
    $quotesMapper = new QuotesMapper($this->db);
    $from = -9;
    $count = 9;
    for ($i = $page; $i >= 1; $i--) {
        $from += 9;
    }
    $quotes = $quotesMapper->getQuotesLimit($from, $count);
    $rows = $quotesMapper->getQuotesCount();
    $numberOfPages = ceil($rows / 9.0);
    if ($page > $numberOfPages || $page < 1) {
        return $response->withStatus(404);
    } else {
        return $this->view->render($response, 'home.html.twig', [
            "currentPage" => $page,
            "numberOfPages" => $numberOfPages,
            "quotes" => $quotes
        ]);
    }
})->setName("home");