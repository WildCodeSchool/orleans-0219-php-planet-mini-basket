<?php

namespace App\Controller;

use App\Model\NewsManager;

use App\tools\CleanData;

class NewsAdminController extends AbstractController
{
    public function index()
    {
        $newsManager = new NewsManager();
        $news = $newsManager->selectAll();
        return $this->twig->render('NewsAdmin/index.html.twig', ['news' => $news]);
    }

    public function add()
    {
        $error = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cleanData = new CleanData($_POST);
            $data = $cleanData->trimData();
            $newsManager = new NewsManager();
            if (empty($data['title'])) {
                $error['title'] = 'Veuillez compléter le champ tite';
            }

            if (empty($data['content'])) {
                $error['content'] = 'Veuillez inséré un contenue';
            } else {
                $news = [
                    'news_title' => $data['title'],
                    'news_content' => $data['content']
                ];
                $id = $newsManager->insert($news);
                header('Location:/NewsAdmin/show/' . $id);
            }
        }
        return $this->twig->render('NewsAdmin/add.html.twig', ['error' => $error]);
    }

    public function show(int $id)
    {
        $newsManager = new NewsManager();
        $news = $newsManager->selectOneById($id);
        return $this->twig->render('NewsAdmin/show.html.twig', ['news' => $news]);
    }
}
