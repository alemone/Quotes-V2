<?php

/**
 * Created by PhpStorm.
 * User: Anwender
 * Date: 05.12.2016
 * Time: 15:21
 */
class QuotesMapper extends Mapper
{
    public function getQuotes()
    {
        $authorMapper = new AuthorMapper($this->db);
        $userMapper = new UserMapper($this->db);
        $sql = "SELECT q.id, q.content, q.date, q.author_id, q.user_sub
                FROM quotes q";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $data = $stmt->fetchAll();
        if ($result && !is_bool($data)) {
            $quotes = [];
            foreach ($data as $quote) {
                $quote["author"] = $authorMapper->getAuthorById($quote["author_id"]);
                $quote["user"] = $userMapper->getUserBySub($quote["user_sub"]);
                $quotes [] = new QuotesEntity($quote);
            }
            return $quotes;
        } else {
            throw new NotFoundException("No quotes found");
        }
    }

    public function getQuotesCount()
    {
        $sql = "SELECT COUNT(q.id) AS rows
                FROM quotes q";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $data = $stmt->fetch();
        if ($result && !is_bool($data)) {
            return $data["rows"];
        } else {
            throw new NotFoundException("No quotes found");
        }
    }

    public function getQuotesLimit($from, $count)
    {
        $authorMapper = new AuthorMapper($this->db);
        $userMapper = new UserMapper($this->db);
        $sql = "SELECT q.id, q.content, q.date, q.author_id, q.user_sub
                FROM quotes q
                ORDER BY q.id DESC
                LIMIT :from,:count";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "from" => $from,
            "count" => $count,
        ]);
        $data = $stmt->fetchAll();
        if ($result && !is_bool($data)) {
            $quotes = [];
            foreach ($data as $quote) {
                $quote["author"] = $authorMapper->getAuthorById($quote["author_id"]);
                $quote["user"] = $userMapper->getUserBySub($quote["user_sub"]);
                $quotes [] = new QuotesEntity($quote);
            }
            return $quotes;
        } else {
            throw new NotFoundException("No quotes found");
        }
    }

    public function saveQuote(QuotesEntity $quote)
    {
        $date = new DateTime($quote->getDate());
        $sql = "INSERT INTO quotes
            (content, date, user_sub, author_id) VALUES
            (:content,:date, :user_sub, :author_id )";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "content" => $quote->getContent(),
            "date" => $date->format("Y-m-d"),
            "user_sub" => $quote->getUser()->getSub(),
            "author_id" => $quote->getAuthor()->getId()
        ]);
        if (!$result) {
            throw new Exception("could not save record");
        }
    }

}