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

#region setupContainer

require_once 'dependencies.php';


#endregion


$routeFiles = (array)glob('../routes/*/*.php');
foreach ($routeFiles as $routeFile) {
    require $routeFile;
}


$app->run();
