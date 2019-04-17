<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ItemManager;

/**
 * Class ItemController
 *
 */
class LegalMentionsController extends AbstractController
{


    /**
     * Display legal listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function legal()
    {
        return $this->twig->render('LegalMentions/legal.html.twig');
    }
}
