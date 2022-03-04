<?php

namespace Weble\CercaImprese\Connectors;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Weble\CercaImprese\Requests\Imprese\ImpreseBaseRequest;
use Weble\CercaImprese\Response\Response;

class Imprese extends SaloonConnector
{
    use AcceptsJson;

    public const TEST_URL = 'https://test.imprese.openapi.it';
    public const URL = 'https://imprese.openapi.it';

    protected array $requests = [
        ImpreseBaseRequest::class,
    ];

    protected ?string $response = Response::class;

    protected string $token;
    protected bool $test;

    public function __construct(
    ) {
        $this->token = config('cercaimprese.token', '');
        $this->test = config('cercaimprese.test', true);
    }

    public function defaultHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
        ];
    }

    public function defineBaseUrl(): string
    {
        if ($this->test) {
            return self::TEST_URL;
        }

        return self::URL;
    }
}
