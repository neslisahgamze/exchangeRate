<?php

namespace App\Services;

use App\Entity\ExchangeRate;
use App\Utils\ExchangeRateConst;

/**
 * Class TCMBProvider
 * @package App\Services
 */
class TCMBProvider implements ExchangeRateInterface
{
    /**
     * @var USD Currency
     */
    private $usd;
    /**
     * @var EURO Currency
     */
    private $eur;
    /**
     * @var GBP Currency
     */
    private $gbp;
    /**
     * @var \DateTime Updated Time
     */
    private $updatedAt;

    /**
     * TCMBProvider constructor.
     * @param RateProvider $provider
     */
    public function __construct(RateProvider $provider)
    {
        $rate = $provider->load('tcmb.url');
        $result = $rate->result;

        $this->usd = $this->find($result, 'USDTRY');
        $this->eur = $this->find($result, 'EURTRY');
        $this->gbp = $this->find($result, 'GBPTRY');

        $this->updatedAt = new \DateTime();
    }

    /**
     * JSearch json array
     *
     * @param $list
     * @param $symbol
     * @return mixed
     */
    private function find($list, $symbol)
    {
        foreach ($list as $rate) {
            if ($rate->symbol == $symbol) {
                return $rate->amount;
            }
        }
    }

    /**
     * @return int|mixed
     */
    public function getSource()
    {
        return ExchangeRateConst::TCMB;
    }

    /**
     * @return mixed
     */
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * @return mixed
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * @return mixed
     */
    public function getGbp()
    {
        return $this->gbp;
    }

    /**
     * @return \DateTime|mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}