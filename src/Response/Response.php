<?php

namespace Weble\CercaImprese\Response;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;

class Response extends SaloonResponse
{
    public function data(): Collection
    {
        return $this->recursiveCollect(collect($this->json('data')));
    }

    private function recursiveCollect(Collection $data)
    {
        return $data->map(function ($value) {
            if ($value instanceof Collection) {
                return $value;
            }

            if (is_array($value) || is_object($value)) {
                return $this->recursiveCollect(collect($value));
            }

            return $value;
        });
    }
}
