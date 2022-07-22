<?php

namespace Daaner\TurboSMS\Tests;

use Daaner\TurboSMS\Facades\TurboSMS;
use Daaner\TurboSMS\TurboSMSServiceProvider as ServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

abstract class TestCase extends TestbenchTestCase
{
    protected function getPackageProviders(/** @scrutinizer ignore-unused */ $app): array
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases(/** @scrutinizer ignore-unused */ $app): array
    {
        return ['TurboSMS' => TurboSMS::class];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }
}
