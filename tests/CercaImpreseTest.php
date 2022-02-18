<?php

use Weble\CercaImprese\Facades\CercaImprese;

it('can do a basic search on a company', function () {
    expect(CercaImprese::base(search: '12485671007')->get('piva'))->toBe('12485671007');
});

it('can do an advanced search on a company name', function () {
    $results = CercaImprese::advanced(denominazione: 'altravia');
    expect($results->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});

it('can do an advanced search on a company state', function () {
    $results = CercaImprese::advanced(provincia: 'RM');
    expect($results->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});

it('can do an advanced search on a company ateco', function () {
    $results = CercaImprese::advanced(codice_ateco: '6201');
    expect($results->first()->get('denominazione'))->toBe('ALTRAVIA SERVIZI SOCIETA\' A RESPONSABILITA\' LIMITATA');
});
