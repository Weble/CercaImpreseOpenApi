<?php

use Weble\CercaImprese\Requests\Imprese\ImpreseAdvancedRequest;
use Weble\CercaImprese\Requests\Imprese\ImpreseBaseRequest;

it('can do a basic search on a company', function () {
    $request = new ImpreseBaseRequest(search: '12485671007');
    expect($request->send()->data()->get('piva'))->toBe('12485671007');
});

it('can do an advanced search on a company name', function () {
    $request = new ImpreseAdvancedRequest(denominazione: 'altravia');
    expect($request->send()->data()->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});

it('can do an advanced search on a company state', function () {
    $request = new ImpreseAdvancedRequest(provincia: 'RM');
    expect($request->send()->data()->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});

it('can do an advanced search on a company ateco', function () {
    $request = new ImpreseAdvancedRequest(codice_ateco: '6201');
    expect($request->send()->data()->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});
