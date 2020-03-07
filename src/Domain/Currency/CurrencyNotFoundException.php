<?php
declare(strict_types=1);

namespace App\Domain\Currency;

use App\Domain\DomainException\DomainRecordNotFoundException;

class CurrencyNotFoundException extends DomainRecordNotFoundException
{
    /**
     * @param string|null $code The currency code, e.g. "USD"
     */
    public function __construct(?string $code)
    {
        $this->message = 'The currency ' . ($code ?: 'you requested') . ' does not exist.';
    }
}
