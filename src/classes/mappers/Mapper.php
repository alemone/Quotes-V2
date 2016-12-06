<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 12.11.2016
 * Time: 19:23
 */
abstract class Mapper
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}