<?php
/**
 * Created by PhpStorm.
 * User: maiwenn
 * Date: 30/04/2019
 * Time: 16:28
 */

namespace App\Controller;

use App\Model\ActivitiesManager;
use App\tools\CleanData;

class AdminController extends AbstractController
{
    /**
     * Display admin page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {

        return $this->twig->render('Admin/index.html.twig');
    }
}
