<?php

namespace Weble\CercaImprese;

use Illuminate\Support\Collection;
use Weble\CercaImprese\Connectors\Imprese;
use Weble\CercaImprese\Requests\Imprese\ImpreseAdvancedRequest;
use Weble\CercaImprese\Requests\Imprese\ImpreseBaseRequest;
use Weble\CercaImprese\Response\Response;

class CercaImprese
{
    public function __construct(protected Imprese $connector)
    {
    }

    public function base(string $search): Collection
    {
        /** @var Response $response */
        $response = (new ImpreseBaseRequest(search: $search))->send();
        return $response->data();
    }

    public function advanced(
        ?string $denominazione = null,
        ?string $provincia = null,
        ?string $codice_ateco = null,
        ?int    $fatturato_min = null,
        ?int    $fatturato_max = null,
        ?int    $dipendenti_min = null,
        ?int    $dipendenti_max = null,
        ?int    $limite = 1,
        ?bool   $dry_run = false,): Collection
    {
        /** @var Response $response */
        $response = (new ImpreseAdvancedRequest(
            denominazione: $denominazione,
            provincia: $provincia,
            codice_ateco: $codice_ateco,
            fatturato_min: $fatturato_min,
            fatturato_max: $fatturato_max,
            dipendenti_min: $dipendenti_min,
            dipendenti_max: $dipendenti_max,
            limite: $limite,
            dry_run: $dry_run,
        ))->send();

        return $response->data();
    }
}
