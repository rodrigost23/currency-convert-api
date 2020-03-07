<?php

declare(strict_types=1);

namespace App\Domain\Currency;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="currency")
 */
class Currency implements JsonSerializable
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int|null
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $code;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $symbol;

    /**
     * @ORM\Column(type="decimal")
     * @var float
     */
    private $rate;

    /**
     * @param int|null  $id
     * @param string    $code
     * @param string    $symbol
     * @param float     $rate
     */
    public function __construct(?int $id, string $code, string $symbol, float $rate)
    {
        $this->id = $id;
        $this->code = strtoupper($code);
        $this->symbol = $symbol;
        $this->rate = $rate;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'rate' => $this->rate,
        ];
    }
}
