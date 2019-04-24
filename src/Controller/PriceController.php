<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */
namespace App\Controller;
use App\Model\PriceManager;
/**
 * Class PricesController
 *
 */
class PriceController extends AbstractController
{
    /**
     * Display prices listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $pricesManager = new PriceManager();
        $prices = $pricesManager->selectAll();
        return $this->twig->render('Price/index.html.twig', ['prices' => $prices]);
    }
}