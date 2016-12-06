<?php

/**
 * Created by PhpStorm.
 * User: Anwender
 * Date: 05.12.2016
 * Time: 15:21
 */
class AuthorMapper extends Mapper
{
    public function getAuthorById($id)
    {
        $sql = "SELECT a.id, a.name, a.thumbnail
                FROM author a
                WHERE a.id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "id" => $id
        ]);
        $data = $stmt->fetch();
        if ($result && !is_bool($data)) {
            return new AuthorEntity($data);
        } else {
            throw new NotFoundException("No author found");
        }
    }

    public function getAuthors()
    {
        $authors = [];
        $sql = "SELECT a.id
                FROM author a";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $data = $stmt->fetchAll();
        if ($result && !is_bool($data)) {
            foreach ($data as $author) {
                $authors[] = $this->getAuthorById($author["id"]);
            }
            return $authors;
        } else {
            throw new NotFoundException("No author found");
        }
    }

    public function saveAuthor(AuthorEntity $author)
    {
        $sql = "INSERT INTO author
            (thumbnail, name) VALUES
            (:thumbnail,:name)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "thumbnail" => $author->getThumbnail(),
            "name" => $author->getName()
        ]);
        if (!$result) {
            throw new Exception("could not save record");
        }
    }

}