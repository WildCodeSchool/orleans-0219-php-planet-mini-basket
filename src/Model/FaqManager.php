<?php


namespace App\Model;

class FaqManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'faq';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
      
    }
  

    public function update(array $faqs):bool
    {
        $statement = $this->pdo->prepare("UPDATE $this->table SET `question_name` = :question_name, `answer_name` = :answer_name WHERE id=:id");
        $statement->bindValue('id', $faqs['id'], \PDO::PARAM_INT);
        $statement->bindValue('question_name', $faqs['question_name'], \PDO::PARAM_STR);
        $statement->bindValue('answer_name', $faqs['answer_name'], \PDO::PARAM_STR);
        return $statement->execute();
    }
  

    public function insert(array $news): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`question_name`,`answer_name`) 
        VALUES (:question_name,:answer_name)");
        $statement->bindValue('question_name', $news['question_name'], \PDO::PARAM_STR);
        $statement->bindValue('answer_name', $news['answer_name'], \PDO::PARAM_STR);
        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }

    }
}
