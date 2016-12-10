<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 06.12.2016
 * Time: 00:39
 */
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;

$app->group('/api', function () {
    $this->post('/login', function (Request $request, Response $response) {
        $userMapper = new UserMapper($this->db);
        $token = $request->getParams();
        $id = $token["id"];
        $json = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=$id");
        $data = json_decode($json, true);
        $data["user_token"] = $id;
        $user = new UserEntity($data);
        if (!$userMapper->DBcontainsUserBySub($user->getSub())) {
            $userMapper->saveUser($user);
        }
        $payload = [
            "user" => $userMapper->getUserBySub($user->getSub())
        ];
        $secret = EnvironmentHelper::getSecret();
        $token = JWT::encode($payload, $secret, "HS256");
        $response = FigResponseCookies::set($response, SetCookie::create('token')
            ->withValue($token)
            ->withMaxAge(2000)
            ->withSecure(false)
            ->withHttpOnly(true)
            ->withDomain(EnvironmentHelper::getServerHost())
            ->withPath('/')
        );
        return $response->withStatus(200);

    });
    $this->delete('/login', function (Request $request, Response $response) {
        var_dump("del");
        $response = FigResponseCookies::expire($response, 'token');
        return $response->withStatus(200);

    });
});