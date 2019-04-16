<?php


namespace App\Controller;

use App\Model\StageManager;

class StageController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $stageCamp = new StageManager();
        $stages = $stageCamp->selectAll();
        return $this->twig->render('Stage/index.html.twig', ['stages' => $stages]);
    }
}
