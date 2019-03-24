<?php

namespace App\Services;

/**
 * Interface ExchangeRateInterface
 * @package App\Services
 */
interface ExchangeRateInterface
{
    /**
     * @return mixed
     */
    public function getSource();

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
