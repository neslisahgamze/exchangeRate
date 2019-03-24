<?php

namespace App\Command;

use App\Utils\RateFactory;
use App\Services\TCMBProvider;
use App\Services\RateProvider;
use App\Services\FCCProvider;
use App\Entity\ExchangeRate;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class FetchExchangeRateCommand
 * @package App\Command
 */
class FetchExchangeRateCommand extends ContainerAwareCommand
{
    /**
     * Define command
     */
    protected function configure()
    {
        $this
            ->setName('sync:exchange-rates')
            ->setDescription('Fetch the exchnage rates and writes them to database.');

    }

    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $doctrine = $this->getContainer()->get('doctrine');
        $repository = $doctrine->getRepository(ExchangeRate::class);

        $provider = $this->getContainer()->get(RateProvider::class);

        $updateOrInsert = function ($adapterClass) use ($provider, $repository, $doctrine) {
            $adapter = new $adapterClass($provider);
            $rate = RateFactory::create($adapter);

            $current = $repository->findOneBy(['source' => $rate->getSource()]);

            if (is_null($current) == false) {
                $rate->setId($current->getId());
            }

            $doctrine->getEntityManager()->merge($rate);
        };

        $updateOrInsert(TCMBProvider::class);
        $updateOrInsert(FCCProvider::class);

        $doctrine->getEntityManager()->flush();

    }

}

