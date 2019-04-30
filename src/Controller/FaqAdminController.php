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
    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $faqManager = new FaqManager();
        $faqManager->delete($id);
        header('Location:/FaqAdmin/index');
    }
    public function show(int $id)
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectOneById($id);
        return $this->twig->render('FaqAdmin/show.html.twig', ['faqs' => $faqs]);
    }
}