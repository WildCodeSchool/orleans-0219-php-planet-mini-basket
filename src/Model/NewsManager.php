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

    public function update(array $news): bool
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `news_title` = :title,`news_content`= :content
 WHERE id=:id");
        $statement->bindValue('id', $news['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $news['title'], \PDO::PARAM_STR);
        $statement->bindValue('content', $news['content'], \PDO::PARAM_STR);

        return $statement->execute();
    }
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

    }
}
