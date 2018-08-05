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

    public function testDeclarationWithClassName()
    {
        $stub = new ModelBaseServiceStub();
        $stub->service;
    }

    public function testDeclarationWithArray()
    {
        $stub = new ModelConfigAsArrayStub();
        $stub->service;
    }

    public function testMissingClassElement()
    {
        $stub = new ModelConfigMissingClassStub();
        $this->expectException(\yii\base\InvalidConfigException::class);
        $stub->service;
    }
}
