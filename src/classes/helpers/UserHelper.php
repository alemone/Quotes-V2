<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 10.12.2016
 * Time: 04:07
 */
abstract class UserHelper
{
    /**
     * @return UserEntity
     * @param $user_token
     */
    public static function getUserByToken($user_token)
    {
        $json = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=$user_token");
        $data = json_decode($json, true);
        $data["user_token"] = $user_token;
        return new UserEntity($data);
    }
}