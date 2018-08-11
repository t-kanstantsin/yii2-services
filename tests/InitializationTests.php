<?php

use MP\Services\Stub\Services\BaseServiceStub;
use MP\Services\Stub\Models\ModelBaseServiceStub;
use PHPUnit\Framework\TestCase;

class InitializationTests extends TestCase
{
    public function testInitialization(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->assertEmpty($stub->getServicesInstances(), 'Services array must be empty right after object creating');
        $stub->service;
        $this->assertNotEmpty($stub->getServicesInstances(), 'Service array must contain initialized object for `service`');
        $this->assertArrayHasKey('service', $stub->getServicesInstances(), 'Service in trait must by indexed by its name');
        $this->assertInstanceOf(BaseServiceStub::class, $stub->getServicesInstances()['service']);
    }
}
