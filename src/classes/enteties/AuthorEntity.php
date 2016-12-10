<?php

/**
 * Created by PhpStorm.
 * User: Anwender
 * Date: 05.12.2016
 * Time: 15:12
 */
class AuthorEntity implements JsonSerializable
{
    private $id;
    private $thumbnail;
    private $name;
    private $user;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->thumbnail = isset($data['thumbnail']) ? $data['thumbnail'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->user = isset($data['user']) ? $data['user'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return mixed|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return UserEntity
     */
    public function getUser()
    {
        return $this->user;
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