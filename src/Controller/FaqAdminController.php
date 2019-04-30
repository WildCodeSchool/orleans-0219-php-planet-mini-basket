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
    public function show(int $id)
    {
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectOneById($id);
        return $this->twig->render('FaqAdmin/show.html.twig', ['faqs' => $faqs]);
    }
}