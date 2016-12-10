<?php
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

require_once 'includes.php';

#region Config
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host'] = EnvironmentHelper::getDBvalues()["host"];
$config['db']['date'] = EnvironmentHelper::getDBvalues()["date"];
$config['db']['pass'] = EnvironmentHelper::getDBvalues()["pass"];
$config['db']['dbname'] = EnvironmentHelper::getDBvalues()["dbname"];
#endregion

$app = new \Slim\App(["settings" => $config]);


require_once 'dependencies.php';

$app->add(new \Slim\Middleware\JwtAuthentication([
    "logger" => $container["logger"],
    "relaxed" => ["localhost", "quotes.localhost"],
    "secret" => EnvironmentHelper::getSecret(),
    "rules" => [
        new \Slim\Middleware\JwtAuthentication\RequestPathRule([
            "path" => "/",
            "passthrough" => ["/home", "/public", "/api/login", "/api/files", "/makecoffee"]
        ]),
        new \Slim\Middleware\JwtAuthentication\RequestMethodRule([
            "passthrough" => ["OPTIONS"]
        ])
    ],

    "callback" => function (Request $request, Response $response, $args) use ($container) {
        $decoded = $args["decoded"];
        $userMapper = new UserMapper($container->db);
        $sub = $decoded->user->sub;
        if ($userMapper->DBcontainsUserBySub($sub)) {
            $user = $userMapper->getUserBySub($sub);
            $container["user"] = $user;
        } else {
            $container->logger->addDebug("Sub: $sub");
            return $response->withHeader('Location', '/home');
        }
    },
    "error" => function (Request $request, Response $response, $args) use ($container) {

        $data["status"] = "error";
        $data["message"] = $args["message"];
        $container->logger->addInfo(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        return $response->withHeader('Location', '/home');
    }
]));

$routeFiles = (array)glob('../routes/*/*.php');
foreach ($routeFiles as $routeFile) {
    require $routeFile;
}


$app->run();
