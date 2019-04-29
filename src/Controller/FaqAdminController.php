<?php

namespace App\Controller;

use App\Model\FaqAdminManager;
use App\tools\CleanData;

class FaqAdminController extends AbstractController
{


    public function index()
    {
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectAll();

        return $this->twig->render('FaqAdmin/index.html.twig', ['faqs' => $faqs]);
    }


    public function add()
    {
        $error = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cleanData = new CleanData($_POST);
            $data = $cleanData->trimData();
            $faqManager = new FaqAdminManager();
            var_dump($data);
            if (empty($data['question_name'])) {
                $error['question'] = 'Veuillez entrer votre question';
            }
            if (empty($data['answer_name'])) {
                $error['answer_name'] = 'Veuillez entre votre réponse';
            } else {
                $faq = [
                    'question_name' => $data['question_name'],
                    'answer_name' => $data['answer_name']
                ];
                var_dump($faq);
                $id = $faqManager->insert($faq);
                header('Location:/FaqAdmin/show/' . $id);
            }
        }
        return $this->twig->render('FaqAdmin/add.html.twig', ['error'=>$error]);
    }


    public function show(int $id)
    {
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectOneById($id);
        return $this->twig->render('FaqAdmin/show.html.twig', ['faqs' => $faqs]);
    }


    public function edit(int $id): string
    {
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $faqs['question_name'] = $_POST['question_name'];
            $faqs['answer_name'] = $_POST['answer_name'];
            $faqManager->update($faqs);
        }

        return $this->twig->render('FaqAdmin/edit.html.twig', ['faqs' => $faqs]);
    }

    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $faqManager = new FaqAdminManager();
        $faqManager->delete($id);
        header('Location:/FaqAdmin/index');
    }
}

