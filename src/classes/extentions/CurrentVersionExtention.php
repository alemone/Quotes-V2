<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 07.12.2016
 * Time: 22:42
 */
class CurrentVersionExtention extends \Twig_Extension
{
    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('current_version', array($this, 'current_version')),
        );
    }

    public function current_version()
    {
        return EnvironmentHelper::getCurrentVersion();
    }
}