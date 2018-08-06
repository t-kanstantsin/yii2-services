<?php

use MP\Services\Stub\BaseServiceStub;
use MP\Services\Stub\InheritServiceStub;
use MP\Services\Stub\ModelBaseServiceStub;
use MP\Services\Stub\ModelNoServiceStub;
use PHPUnit\Framework\TestCase;
use yii\base\InvalidCallException;

class SetterTests extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testUnset(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->service;
        $this->assertNotEmpty($stub->getServicesInstances());
        unset($stub->service);
        $this->assertEmpty($stub->getServicesInstances());
    }

    /**
     * @throws ReflectionException
     */
    public function testUnsetUnkown(): void
    {
        $stub = new ModelNoServiceStub();
        $this->expectException(InvalidCallException::class);
        unset($stub->service);
    }

    public function testSetToServerless(): void
    {
        $stub = new ModelNoServiceStub();

        $this->expectException(InvalidCallException::class);
        $stub->service = null;
    }

    public function testSet(): void
    {
        $stub = new ModelBaseServiceStub();

        $stub->service = new BaseServiceStub();
        $this->assertInstanceOf(BaseServiceStub::class, $stub->service);
    }

    public function testSetUnknown(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->expectException(\yii\base\UnknownPropertyException::class);
        $stub->foo = new BaseServiceStub();
    }

    public function testSetWrongService(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->expectException(InvalidCallException::class);
        $stub->service = new InheritServiceStub();
    }
}
