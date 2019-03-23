<?php

namespace App\Service;
/**
 * Interface ExchangeRateInterface
 * @package App\Service
 */
interface ExchangeRateInterface
{
    /**
     * @return mixed
     */
    public function getProvider();
    /**
     * @return mixed
     */
    public function getUsd();
    /**
     * @return mixed
     */
    public function getEur();
    /**
     * @return mixed
     */
    public function getGbp();
    /**
     * @return mixed
     */
    public function getUpdatedAt();
}
