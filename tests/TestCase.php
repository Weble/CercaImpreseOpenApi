<?php

namespace Weble\CercaImprese\Tests;

use Dotenv\Dotenv;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Env;
use Orchestra\Testbench\TestCase as Orchestra;
use Weble\CercaImprese\CercaImpreseServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Weble\\CercaImprese\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CercaImpreseServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $env = Dotenv::create(
            Env::getRepository(),
            dirname(__DIR__),
            '.env'
        )->safeLoad();

        config()->set('cercaimprese.test', true);
        config()->set('cercaimprese.token', $env['CERCAIMPRESE_TOKEN'] ?? '');
    }
}
