<?php


namespace App\Controller;

use App\Model\FaqAdminManager;


class FaqAdminController extends AbstractController
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
        $faqManager = new FaqAdminManager();
        $faqs = $faqManager->selectAll();
        return $this->twig->render('FaqAdmin/index.html.twig', [
            'faqs' => $faqs
        ]);
    }



    public function add($vars)
    {
        $question = $vars["question"];
        $answer = $vars["answer"];
        $faqAdminManager = new FaqAdminManager();
        $faqAdminManager->insert($question, $answer);
        return $this->index();



    }




}
