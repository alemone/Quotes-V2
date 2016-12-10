<?php

/**
 * Created by PhpStorm.
 * User: Ammonix
 * Date: 10.12.2016
 * Time: 16:23
 */
class UserMapper extends Mapper
{
    public function getUserBySub($sub)
    {
        $sql = "SELECT u.user_token, u.sub, u.email, u.family_name, u.given_name, u.name, u.locale, u.picture
               FROM user u
               WHERE u.sub = :sub";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(["sub" => $sub]);
        $data = $stmt->fetch();
        if ($result && !is_bool($data)) {
            return new UserEntity($data);
        } else {
            throw new NotFoundException("No User Found");
        }
    }

    public function saveUser(UserEntity $user)
    {
        $sql = "INSERT INTO user
            (sub, user_token, email, name, given_name, family_name, picture, locale) VALUES
            (:sub, :user_token, :email, :name, :given_name, :family_name, :picture, :locale )";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "sub" => $user->getSub(),
            "user_token" => $user->getUserToken(),
            "email" => $user->getEmail(),
            "name" => $user->getName(),
            "given_name" => $user->getGivenName(),
            "family_name" => $user->getFamilyName(),
            "picture" => $user->getPicture(),
            "locale" => $user->getLocale(),
        ]);
        if (!$result) {
            throw new Exception("could not save record");
        }
    }
    public function DBcontainsUserBySub($sub){
        $sql = "SELECT u.sub
               FROM user u
               WHERE u.sub = :sub";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(["sub" => $sub]);
        $data = $stmt->fetch();
        if ($result && !is_bool($data)) {
            return true;
        } else {
           return false;
        }
    }
}