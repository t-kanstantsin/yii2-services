<?php

use MP\Services\Stub\BaseServiceStub;
use MP\Services\Stub\InheritServiceStub;
use MP\Services\Stub\ModelBaseServiceStub;
use MP\Services\Stub\ModelConfigAsArrayStub;
use MP\Services\Stub\ModelConfigMissingClassStub;
use MP\Services\Stub\ModelConfigNumberStub;
use MP\Services\Stub\ModelNoServiceStub;
use PHPUnit\Framework\TestCase;
use yii\base\InvalidCallException;

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
