<?php


namespace App\Utils;

use App\Entity\ExchangeRate;
use App\Services\ExchangeRateInterface;

/**
 * Class RateFactory
 * @package App\Utils
 */
class RateFactory
{
    /**
     * @param ExchangeRateInterface $adapter
     * @return ExchangeRate
     */
    public static function create(ExchangeRateInterface $adapter): ExchangeRate
    {
        $rate = new ExchangeRate();
        $rate->setProvider($adapter->getProvider());
        $rate->setUsd($adapter->getUsd());
        $rate->setEur($adapter->getEur());
        $rate->setGbp($adapter->getGbp());
        $rate->setUpdatedAt($adapter->getUpdatedAt());
        return $rate;
    }
}