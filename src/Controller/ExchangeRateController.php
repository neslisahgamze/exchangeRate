<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeRateController extends AbstractController
{
    /**
     * @Route("/exchange/rate", name="exchange_rate")
     */

     /**
     * @var ExchangeRateRepository
     */
    private $repository;
    /**
     * ExchangeRateController constructor.
     * @param ExchangeRateRepository $repositorys
     */
    public function __construct(ExchangeRateRepository $repository)
    {
        $this->repository = $repository;

    }

    public function index()
    {
    	$rate = $this->repository->getMinimum();
        $rate =compact('rate');
        return $this->render('exchange_rate/index.html.twig', [
            'rate' => $rate,
        ]);
    }
}
