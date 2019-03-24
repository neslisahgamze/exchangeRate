<?php


namespace App\Services;

use App\Utils\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class RateProvider
 * @package App\Services
 */
class RateProvider
{
    /**
     * @var ClientInterface HTTP istemcisi
     */
    private $client;
    /**
     * @var ContainerInterface Parametre okumak için gereken instance
     */
    private $container;
    /**
     * @var Kur bilgisini tutan instance
     */
    private $rate;

    /**
     * RateProvider constructor.
     * @param ContainerInterface $container
     * @param ClientInterface $client
     */
    public function __construct(ContainerInterface $container, ClientInterface $client)
    {
        $this->container = $container;
        $this->client = $client;
    }

    /**
     * Provider'dan datayı çeker ve json nesnesine çevirir.
     * @param $urlKey
     * @return mixed
     */
    public function load($urlKey)
    {
        $url = $this->container->getParameter($urlKey);
        $response = $this->client->request($url);
        $this->rate = json_decode($response);

        return $this->getRate();
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }
}