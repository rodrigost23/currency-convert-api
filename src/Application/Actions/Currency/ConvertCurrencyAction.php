<?php

declare(strict_types=1);

namespace App\Application\Actions\Currency;

use App\Domain\Currency\CurrencyNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotImplementedException;

class ConvertCurrencyAction extends CurrencyAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $fromCode = $this->resolveArg('from-code');
        $fromCurrency = $this->currencyRepository->findOneBy(['code' => $fromCode]);

        if ($fromCurrency === null) {
            throw new CurrencyNotFoundException($fromCode);            
        }

        $toCode = $this->resolveArg('to-code');
        $toCurrency = $this->currencyRepository->findOneBy(['code' => $toCode]);

        if ($toCurrency === null) {
            throw new CurrencyNotFoundException($toCode);            
        }

        throw new HttpNotImplementedException($this->request);
        

        return $this->respondWithData("...");
    }
}
