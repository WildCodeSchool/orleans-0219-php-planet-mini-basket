<?php


namespace App\Controller;

use App\Model\NewsManager;

class NewsAdminController extends AbstractController
{
    public function news()
    {
        $newsManager = new NewsManager();
        $news = $newsManager->selectAll();
        return $this->twig->render('Admin/news/news.html.twig', ['news' => $news]);
    }
}
