<?php

declare(strict_types=1);

namespace App\Domain\ConversionLog;

use App\Domain\Currency\Currency;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="conversion_log")
 */
class ConversionLog implements JsonSerializable
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int|null
     */
    private $id;

    /**
     * @ORM\Column(type="datetimetz")
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\Currency\Currency")
     * @ORM\JoinColumn(name="from_currency_id", referencedColumnName="id")
     * @var Currency
     */
    private $fromCurrency;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\Currency\Currency")
     * @ORM\JoinColumn(name="to_currency_id", referencedColumnName="id")
     * @var Currency
     */
    private $toCurrency;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @var string
     */
    private $result;

    public function __construct(?int $id, \DateTime $timestamp, Currency $fromCurrency, Currency $toCurrency, string $result)
    {
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->fromCurrency = $fromCurrency;
        $this->toCurrency = $toCurrency;
        $this->result = $result;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @return Currency
     */
    public function getFromCurrency(): Currency
    {
        return $this->fromCurrency;
    }

    /**
     * @return Currency
     */
    public function getToCurrency(): Currency
    {
        return $this->toCurrency;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'timestamp' => $this->timestamp,
            'fromCurrency' => $this->fromCurrency,
            'toCurrency' => $this->toCurrency,
            'result' => $this->result,
        ];
    }
}
