<?php

declare(strict_types=1);

namespace App\Application\Actions\Currency;

use App\Domain\ConversionLog\ConversionLog;
use App\Domain\Currency\Currency;
use App\Domain\Currency\CurrencyNotFoundException;
use DateTime;
use Psr\Http\Message\ResponseInterface as Response;

class ConvertCurrencyAction extends CurrencyAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $fromCode = (string) $this->resolveArg('from-code');
        $toCode = (string) $this->resolveArg('to-code');
        $value = (string) $this->resolveArg('value');

        /**
         * @var Currency|null $fromCurrency
         */
        $fromCurrency = $this->currencyRepository->findOneBy(['code' => $fromCode]);

        if ($fromCurrency === null) {
            throw new CurrencyNotFoundException($fromCode);
        }

        /**
         * @var Currency|null $toCurrency
         */
        $toCurrency = $this->currencyRepository->findOneBy(['code' => $toCode]);

        if ($toCurrency === null) {
            throw new CurrencyNotFoundException($toCode);
        }

        // Using bcmath to correctly calculate decimal numbers:
        // ($value * $toCurrency->getRate()) / $fromCurrency->getRate();
        $result = bcdiv(bcmul($value, $toCurrency->getRate(), 6), $fromCurrency->getRate(), 6);

        $logEntry = new ConversionLog(null, new DateTime(), $fromCurrency, $toCurrency, $value, $result);
        $this->em->persist($logEntry);
        $this->em->flush();

        // Refresh from DB to round the number
        $this->em->refresh($logEntry);

        return $this->respondWithData($logEntry->getResult());
    }
}
