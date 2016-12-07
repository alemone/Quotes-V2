<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 07.12.2016
 * Time: 22:42
 */
class FileExtention extends \Twig_Extension
{
    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('file_exists', array($this, 'file_exists')),
        );
    }

    public function file_exists($url)
    {
        $path = parse_url($url)["path"];
        $filename = basename($url);
        $expression = '/^\/api(\/.*' . $filename . ')$/';
        preg_match($expression, $path, $results);
        if (!empty($results)) {
            $pathToFileOnServer = $results[1];
            return FileHelper::fileExists($pathToFileOnServer);
        } else {
            return false;
        }
    }
}