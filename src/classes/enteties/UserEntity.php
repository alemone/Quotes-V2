<?php

/**
 * Created by PhpStorm.
 * User: Anwender
 * Date: 05.12.2016
 * Time: 15:12
 */
class UserEntity implements JsonSerializable
{
    private $user_token;
    private $sub;
    private $email;
    private $name;
    private $given_name;
    private $family_name;
    private $picture;
    private $locale;

    public function __construct(array $data)
    {
        $this->user_token = isset($data['user_token']) ? $data['user_token'] : null;
        $this->sub = isset($data['sub']) ? $data['sub'] : null;
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->given_name = isset($data['given_name']) ? $data['given_name'] : null;
        $this->family_name = isset($data['family_name']) ? $data['family_name'] : null;
        $this->picture = isset($data['picture']) ? $data['picture'] : null;
        $this->locale = isset($data['locale']) ? $data['locale'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getUserToken()
    {
        return $this->user_token;
    }

    /**
     * @return mixed
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getGivenName()
    {
        return $this->given_name;
    }

    /**
     * @return mixed
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}