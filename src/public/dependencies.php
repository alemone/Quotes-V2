<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 05.12.2016
 * Time: 20:43
 */
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../template', [
        'cache' => false,//'cache',
        'autoreload' => true,
        'debug' => true
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $basePath = SERVER_PROTOCOL . "://" . EnvironmentHelper::getServerHost();
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new TwigFileExtention());
    $view->addExtension(new Twig_Extensions_Extension_Text());
    return $view;
};

$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['date'], $db['pass'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};