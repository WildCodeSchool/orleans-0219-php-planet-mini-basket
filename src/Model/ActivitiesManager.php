<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 24/04/19
 * Time: 11:01
 */

namespace App\Model;

class ActivitiesManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'activities';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
