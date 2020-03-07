<?php

declare(strict_types=1);

namespace App\Application\Actions\ConversionLog;

use Psr\Http\Message\ResponseInterface as Response;

class ListConversionLogAction extends ConversionLogAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $log = $this->conversionLogRepository->findBy([], ['timestamp' => 'DESC'], 5);

        return $this->respondWithData($log);
    }
}
