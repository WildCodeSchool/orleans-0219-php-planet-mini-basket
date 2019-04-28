<?php


namespace App\Controller;

use App\Model\StageManager;

class StageAdminController extends AbstractController
{
    public function index()
    {
        $stageManager = new StageManager();
        $stages = $stageManager->selectAll();
        return $this->twig->render('StageAdmin/index.html.twig', ['stages' => $stages]);
    }
}
