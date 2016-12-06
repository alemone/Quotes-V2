<?php
/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 14.11.2016
 * Time: 18:05
 */


require '../vendor/autoload.php';

require_once '../envValues.php';

require_once '../classes/mappers/Mapper.php';

$routeFiles = (array)glob('../classes/*/*.php');
foreach ($routeFiles as $routeFile) {
    require_once $routeFile;
}