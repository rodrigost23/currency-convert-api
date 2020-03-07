<?php
declare(strict_types=1);

namespace App\Application\Actions\Currency;

use App\Application\Actions\Action;
use App\Domain\Currency\Currency;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Log\LoggerInterface;

abstract class CurrencyAction extends Action
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var ObjectRepository|EntityRepository
     */
    protected $currencyRepository;

    /**
     * @param LoggerInterface $logger
     * @param ExchangeRepository  $exchangeRepository
     */
    public function __construct(LoggerInterface $logger, EntityManagerInterface $em)
    {
        parent::__construct($logger);
        $this->em = $em;
        $this->currencyRepository = $this->em->getRepository(Currency::class);
    }
}
