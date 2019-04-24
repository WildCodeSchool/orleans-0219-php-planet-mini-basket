<?php


namespace App\Controller;

use App\Model\FaqManager;

class AdminController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectAll();
        return $this->twig->render('Admin/adminFaq.html.twig', [
            'faqs' => $faqs
        ]);
    }
}
