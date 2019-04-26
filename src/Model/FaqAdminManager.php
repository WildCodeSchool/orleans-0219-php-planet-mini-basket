<?php
/**
 * Created by PhpStorm.
 * User: maiwenn
 * Date: 26/04/2019
 * Time: 20:59
 */

namespace App\Model;


class FaqAdminManager extends AbstractManager
{
    const TABLE = 'faq';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    public function insert($question, $answer): int
    {

        $statement = $this->pdo->prepare("INSERT INTO $this->table (`question_name`, `answer_name`) VALUES (:question_name, :answer_name)");
        $statement->bindValue(':question_name', $question, \PDO::PARAM_STR);
        $statement->bindValue(':answer_name', $answer, \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}

