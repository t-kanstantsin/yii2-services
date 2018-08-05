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

class GetterTests extends TestCase
{
    public function testGetFromServerless(): void
    {
        $stub = new ModelNoServiceStub();

        $this->expectException(\yii\base\UnknownPropertyException::class);
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

        $this->expectException(\yii\base\UnknownPropertyException::class);
        $stub->foo;
    }
}
