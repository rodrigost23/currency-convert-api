<?php

declare(strict_types=1);

namespace App\Application\Actions\Currency;

use App\Domain\Currency\CurrencyNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;

class ViewCurrencyAction extends CurrencyAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $currencyCode = $this->resolveArg('code');
        $currency = $this->currencyRepository->findOneBy(['code' => $currencyCode]);

        if ($currency === null) {
            throw new CurrencyNotFoundException($currencyCode);            
        }

        return $this->respondWithData($currency);
    }
}
