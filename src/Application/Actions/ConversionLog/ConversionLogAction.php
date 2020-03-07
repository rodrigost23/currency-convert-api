<?php

declare(strict_types=1);

namespace App\Application\Actions\ConversionLog;

use App\Application\Actions\Action;
use App\Domain\ConversionLog\ConversionLog;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Log\LoggerInterface;

abstract class ConversionLogAction extends Action
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var ObjectRepository|EntityRepository
     */
    protected $conversionLogRepository;

    /**
     * @param LoggerInterface $logger
     * @param ExchangeRepository  $exchangeRepository
     */
    public function __construct(LoggerInterface $logger, EntityManagerInterface $em)
    {
        parent::__construct($logger);
        $this->em = $em;
        $this->conversionLogRepository = $this->em->getRepository(ConversionLog::class);
    }
}
