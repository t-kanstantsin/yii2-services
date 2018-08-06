<?php

use MP\Services\Stub\BaseServiceStub;
use MP\Services\Stub\ModelBaseServiceStub;
use PHPUnit\Framework\TestCase;
use yii\base\UnknownMethodException;

class CallTests extends TestCase
{
    public function testCallService(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->assertInstanceOf(BaseServiceStub::class, $stub->getService());
    }

    public function testCallUnknownService(): void
    {
        $stub = new ModelBaseServiceStub();

        $this->expectException(UnknownMethodException::class);
        $stub->getFooService();
    }
}
