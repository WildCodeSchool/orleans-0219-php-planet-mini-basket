<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 24/04/19
 * Time: 11:00
 */

namespace App\Controller;

use App\Model\ActivitiesManager;

class ActivitiesController extends AbstractController
{
    /**
     * Display activities page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $activitiesManager = new ActivitiesManager();
        $activities = $activitiesManager->selectAll();
        return $this->twig->render('Activities/index.html.twig', [
            'activities' => $activities
        ]);
    }
}
