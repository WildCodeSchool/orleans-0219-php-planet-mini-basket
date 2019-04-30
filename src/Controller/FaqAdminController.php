<?php
namespace App\Controller;
use App\Model\FaqAdminManager;
class FaqAdminController extends AbstractController
{
    public function index()
    {
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectAll();
        return $this->twig->render('FaqAdmin/index.html.twig', ['faqs' => $faqs]);
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
}
