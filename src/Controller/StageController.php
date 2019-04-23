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
        $stageManager = new StageManager();
        $stages = $stageManager->selectAll();
        return $this->twig->render('Stage/stage.html.twig', ['stages' => $stages]);
    }
}
