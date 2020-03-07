<?php

declare(strict_types=1);

use App\Application\Actions\ConversionLog\ListConversionLogAction;
use App\Application\Actions\Currency\ConvertCurrencyAction;
use App\Application\Actions\Currency\ListCurrenciesAction;
use App\Application\Actions\Currency\ViewCurrencyAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/currency', function (Group $group) {
        $group->get('/list', ListCurrenciesAction::class);
        $group->get('/{code}', ViewCurrencyAction::class);
    });

    $app->group('/convert', function (Group $group) {
        $group->get('/{from-code}/{to-code}/{value}', ConvertCurrencyAction::class);
        $group->get('/log', ListConversionLogAction::class);
    });
};
