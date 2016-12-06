<?php
/**
 * Created by PhpStorm.
 * User: Joan Künzler
 * Date: 29.11.2016
 * Time: 14:59
 */
use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

$app->group('/api/files', function () {
    $this->get('/images/{data:.+\..+}', function (Request $request, Response $response, array $args) {
        $data = $args['data'];
        $image = @file_get_contents("../files/images/$data");
        if ($image === FALSE) {
            $handler = $this->notFoundHandler;
            return $handler($request, $response);
        }

        $response->write($image);
        return $response->withHeader('Content-Type', 'image/*');
    });
    $this->get('/pdf/{data:.+\..+}', function (Request $request, Response $response, array $args) {
        $data = $args['data'];
        $pdfFile = @file_get_contents("../../files/pdf/$data");
        if ($pdfFile === FALSE) {
            $handler = $this->notFoundHandler;
            return $handler($request, $response);
        }
        $response->write($pdfFile);
        return $response->withHeader('Content-Type', 'application/pdf');
    });
});