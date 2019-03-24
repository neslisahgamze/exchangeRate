<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeRateController extends AbstractController
{
    /**
     * @Route("/exchange/rate", name="exchange_rate")
     */
    public function index()
    {
        return $this->render('exchange_rate/index.html.twig', [
            'controller_name' => 'ExchangeRateController',
        ]);
    }
}
