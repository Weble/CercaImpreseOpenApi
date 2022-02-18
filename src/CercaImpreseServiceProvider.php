<?php

namespace Weble\CercaImprese;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CercaImpreseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('cercaimprese')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(CercaImprese::class);
    }
}
