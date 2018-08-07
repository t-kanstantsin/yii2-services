<?php

use MP\Services\Stub\Models\ModelBaseServiceStub;
use MP\Services\Stub\Models\ModelNoServiceStub;
use MP\Services\Stub\Services\BaseServiceStub;
use MP\Services\Stub\Services\InheritServiceStub;
use PHPUnit\Framework\TestCase;
use yii\base\UnknownPropertyException;

class GetterTests extends TestCase
{
    public function testGetFromServerless(): void
    {
        $stub = new ModelNoServiceStub();

        $this->expectException(UnknownPropertyException::class);
        $stub->foo;
    }

    public function testGet(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->assertInstanceOf(BaseServiceStub::class, $stub->service);
    }

    public function testGetUnknown(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->expectException(UnknownPropertyException::class);
        $stub->foo;
    }

    public function testGetInherit(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => InheritServiceStub::class,
        ]);

        $this->assertInstanceOf(BaseServiceStub::class, $stub->service->service);
        $this->assertNotSame($stub->service, $stub->service->service);
    }

    public function testGetInheritUnknown(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => InheritServiceStub::class,
        ]);

        $this->expectException(UnknownPropertyException::class);
        $stub->service->fooService;
    }
}
