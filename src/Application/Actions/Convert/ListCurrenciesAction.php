<?php
declare(strict_types=1);

namespace App\Application\Actions\Convert;

use Psr\Http\Message\ResponseInterface as Response;

class ListCurrenciesAction extends ConvertAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $currencies = $this->currencyRepository->findAll();

        return $this->respondWithData($currencies);
    }
}
