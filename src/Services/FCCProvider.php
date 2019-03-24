    <?php


namespace App\Services;

use App\Utils\ExchangeRateConst;

/**
 * Class FCCProvider
 * @package App\Services
 */
class FCCProvider implements ExchangeRateInterface
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
     * FCCProvider constructor.
     * @param RateProvider $provider
     */
    public function __construct(RateProvider $provider)
    {
        $rate = $provider->load('fcc.url');

        $this->usd = $this->find($rate, 'DOLAR');
        $this->eur = $this->find($rate, 'AVRO');
        $this->gbp = $this->find($rate, 'İNGİLİZ STERLİNİ');

        $this->updatedAt = new \DateTime();
    }

    /**
     * Search json array
     *
     * @param $list
     * @param $symbol
     * @return mixed
     */
    private function find($list, $symbol)
    {
        foreach ($list as $rate) {
            if ($rate->kod == $symbol) {
                return $rate->oran;
            }
        }
    }

    /**
     * @return int|mixed
     */
    public function getSource()
    {
        return ExchangeRateConst::FCC;
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
