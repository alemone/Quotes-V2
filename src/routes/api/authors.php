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
    $this->post('/authors', function (Request $request, Response $response) {
        $data = $request->getParams();
        $files = $request->getUploadedFiles();
        $data["user"] = $this->user;
        $data["thumbnail"] = EnvironmentHelper::getDefaultAuthorPB();
        if (!empty($files['thumbnail'])) {
            $data["thumbnail"] = FileHelper::setUserThumbnail($files);
        }
        $authorMapper = new AuthorMapper($this->db);
        $author = new AuthorEntity($data);
        $authorMapper->saveAuthor($author);
        return $response->withStatus(201);
    });
});