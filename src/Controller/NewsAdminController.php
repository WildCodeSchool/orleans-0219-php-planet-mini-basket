<?php


namespace App\Controller;

use App\Model\NewsManager;

class NewsAdminController extends AbstractController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newsManager = new NewsManager();
            $news = [
                'news_title' => $_POST['title'],
                'news_content' => $_POST['content']
            ];
            $id = $newsManager->insert($news);
            header('Location:/Admin/show/' . $id);
        }

        return $this->twig->render('Admin/add.html.twig');
    }
}
