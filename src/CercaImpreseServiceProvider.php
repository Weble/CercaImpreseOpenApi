<?php

namespace Weble\CercaImprese;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Weble\CercaImprese\Commands\CercaImpreseCommand;
use Weble\CercaImprese\Connectors\Imprese;

class CercaImpreseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('cercaimprese')
            ->hasConfigFile();
    }
}
