<?php

namespace Weble\CercaImprese\Requests\Imprese;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Weble\CercaImprese\Connectors\Imprese;

class ImpreseAdvancedRequest extends SaloonRequest
{
    protected ?string $method = Saloon::GET;

    protected ?string $connector = Imprese::class;

    public function defineEndpoint(): string
    {
        return '/advance';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'denominazione' => $this->denominazione,
            'provincia' => $this->provincia,
            'codice_ateco' => $this->codice_ateco,
            'fatturato_min' => $this->fatturato_min,
            'fatturato_max' => $this->fatturato_max,
            'dipendenti_min' => $this->dipendenti_min,
            'dipendenti_max' => $this->dipendenti_max,
            'limite' => $this->limite,
            'dry_run' => $this->dry_run ? 1 : 0,
        ]);
    }

    public function __construct(
        public ?string $denominazione = null,
        public ?string $provincia = null,
        public ?string $codice_ateco = null,
        public ?int    $fatturato_min = null,
        public ?int    $fatturato_max = null,
        public ?int    $dipendenti_min = null,
        public ?int    $dipendenti_max = null,
        public ?int    $limite = 1,
        public ?bool   $dry_run = false,
    ) {
    }
}
