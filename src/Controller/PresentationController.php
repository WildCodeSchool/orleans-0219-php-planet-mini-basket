<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\HistoryManager;
use App\Model\PlaceManager;
use App\Model\PresentationManager;
use App\Model\WhatIsItManager;

/**
 * Class PlaceController
 *
 */
class PresentationController extends AbstractController
{


    /**
     * Display place listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $placeManager = new PlaceManager();
        $places = $placeManager->selectAll();

        $historyManager = new HistoryManager();
        $history = $historyManager->selectAll();

        return $this->twig->render(
            'Presentation/index.html.twig',
            ['places' => $places,
            'history' => $history]
        );
    }
}
