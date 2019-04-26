<?php


namespace App\Controller;

use App\Model\NewsManager;

class NewsAdminController extends AbstractController
{
    public function index()
    {
        $newsManager = new NewsManager();
        $news = $newsManager->selectAll();
        var_dump($news);
        return $this->twig->render('NewsAdmin/index.html.twig', ['news' => $news]);
    }
}
