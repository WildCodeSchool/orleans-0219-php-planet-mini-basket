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
}
