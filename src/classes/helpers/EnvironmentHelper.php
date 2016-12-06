<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 20.09.2016
 * Time: 10:35
 */
abstract class EnvironmentHelper
{
    private static $_localhostUrl = "quotes.localhost";
    private static $_testtUrl = "bmat.dev.ammonix.ch";
    private static $_prodtUrl = "api.brautmodelivia.ch";


    /**
     * @return int
     */
    private static function getEnvironmentName(): int
    {
        switch ($_SERVER["HTTP_HOST"]) {
            case self::$_localhostUrl:
                return Environment::LOCALHOST;
                break;
            case self::$_testtUrl:
                return Environment::TEST;
                break;
            case self::$_prodtUrl:
                return Environment::PROD;
                break;
            default:
                return Environment::__default;
                break;
        }
    }

    //Requires db file
    public static function getDBvalues() :array
    {
        switch (self::getEnvironmentName()) {

            case Environment::LOCALHOST:
                return array("host" => "localhost",
                    "date" => "root",
                    "pass" => "",
                    "dbname" => "ammonixc_quotes");
                break;
            case Environment::TEST:
                return array("host" => constant("TESTHOST"),
                    "date" => constant("TESTUSER"),
                    "pass" => constant("TESTPASS"),
                    "dbname" => constant("TESTDBNAME"));
                break;
            case Environment::PROD:
                return array("host" => constant("PRODHOST"),
                    "date" => constant("PRODUSER"),
                    "pass" => constant("PRODPASS"),
                    "dbname" => constant("PRODDBNAME"));
                break;
            default:
                throw new Exception("Environment undefined!" . $_SERVER["HTTP_HOST"]);
                break;
        }
    }

    public static function getSecret(): string
    {
        return constant("SECRET");
    }
}

abstract class  Environment
{
    const __default = self::UNDEFINED;

    const PROD = 3;
    const TEST = 2;
    const LOCALHOST = 1;
    const UNDEFINED = 0;
}

