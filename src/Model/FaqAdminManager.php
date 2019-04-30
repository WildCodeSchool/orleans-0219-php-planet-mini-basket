<?php
namespace App\Model;
class FaqAdminManager extends AbstractManager
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
     * @param array $item
     * @return bool
     */
    public function update(array $faqs):bool
    {
        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `question_name` = :question_name, `answer_name` = :answer_name WHERE id=:id");
        $statement->bindValue('id', $faqs['id'], \PDO::PARAM_INT);
        $statement->bindValue('question_name', $faqs['question_name'], \PDO::PARAM_STR);
        $statement->bindValue('answer_name', $faqs['answer_name'], \PDO::PARAM_STR);
        return $statement->execute();
    }
}