<?php
/**
 * Created by PhpStorm.
 * User: maiwenn
 * Date: 30/04/2019
 * Time: 16:28
 */

namespace App\Controller;

use App\Model\ActivitiesManager;
use App\tools\CleanData;


class ActivitiesAdminController extends AbstractController
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
        return $this->twig->render('ActivitiesAdmin/index.html.twig', [
            'activities' => $activities
        ]);
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cleanData = new CleanData($_POST);
            $data = $cleanData->trimData();
            $activitiesManager = new ActivitiesManager();
            if (empty($data['name'])) {
                $errors['name'] = 'Veuillez entrer un pour votre activité';
            }
            if (empty($data['description'])) {
                $errors['deesciption'] = 'Veuillez saisir une description';
            }
            if (empty($data['picture'])) {
                $errors['picture'] = 'Veuillez upload une image';
            }
            if (empty($data['alt'])) {
                $errors['alt'] = 'Veuillez saisir une description pour votre image';
            }else {
                $activity = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'picture' => $data['picture'],
                    'alt' => $data['alt']
                ];
                $id = $activitiesManager->insert($activity);
                header('Location:/ActivitiesAdmin/index');
            }
        }
        return $this->twig->render('activitiesAdmin/add.html.twig', ['errors' => $errors]);
    }
}