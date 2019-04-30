<?php
namespace App\Controller;
use App\Model\FaqManager;
class FaqAdminController extends AbstractController
{
    public function index()
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectAll();
        return $this->twig->render('FaqAdmin/index.html.twig', ['faqs' => $faqs]);
    }

    public function edit(int $id): string
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $faqs['question_name'] = $_POST['question_name'];
            $faqs['answer_name'] = $_POST['answer_name'];
            $faqManager->update($faqs);
        }
        return $this->twig->render('FaqAdmin/edit.html.twig', ['faqs' => $faqs]);
    }
}
