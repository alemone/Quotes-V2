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
        $sql = "SELECT q.content, q.date, q.author_id
                FROM quotes q";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $data = $stmt->fetchAll();
        if ($result && !is_bool($data)) {
            $quotes = [];
            foreach ($data as $quote) {
                $quote["author"] = $authorMapper->getAuthorById($quote["author_id"]);
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
            (content, date, author_id) VALUES
            (:content,:date, :author_id)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "content" => $quote->getContent(),
            "date" => $date->format("Y-m-d"),
            "author_id" => $quote->getAuthor()->getId()
        ]);
        if (!$result) {
            throw new Exception("could not save record");
        }
    }

}