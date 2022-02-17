<?php

namespace Weble\CercaImprese\Requests\Imprese;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Weble\CercaImprese\Connectors\Imprese;

class ImpreseBaseRequest extends SaloonRequest
{
    protected ?string $method = Saloon::GET;

    protected ?string $connector = Imprese::class;

    public function defineEndpoint(): string
    {
        return '/base/' . $this->search;
    }

    public function __construct(
        public string $search
    )
    {
    }
}
