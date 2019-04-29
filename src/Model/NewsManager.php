<?php


namespace App\Model;

class NewsManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'news';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $news): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`news_title`,`news_content`) 
        VALUES (:news_title,:news_content)");
        $statement->bindValue('news_title', $news['news_title'], \PDO::PARAM_STR);
        $statement->bindValue('news_content', $news['news_content'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
