<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\PricesManager;

/**
 * Class PricesController
 *
 */
class PricesController extends AbstractController
{


    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $pricesManager = new PricesManager();
        $prices = $pricesManager->selectAll();

        return $this->twig->render('Prices/index.html.twig', ['prices' => $prices]);
    }

    /**
     * Display item informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(int $id)
    {
        $pricesManager = new PricesManager();
        $prices = $pricesManager->selectOneById($id);

        return $this->twig->render('Prices/show.html.twig', ['prices' => $prices]);
    }
}
