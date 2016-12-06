<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 05.12.2016
 * Time: 19:41
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

$app->any('/', function (Request $request, Response $response) {
    return $response->withStatus(302)->withHeader('Location', 'home');
});