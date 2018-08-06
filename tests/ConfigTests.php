<?php

use MP\Services\Stub\BaseModelServiceStub;
use MP\Services\Stub\BaseServiceStub;
use MP\Services\Stub\ModelBaseServiceStub;
use PHPUnit\Framework\TestCase;
use yii\base\InvalidConfigException;

class ConfigTests extends TestCase
{
    public function testDeclarationWithClassName(): void
    {
        $stub = new ModelBaseServiceStub();
        $this->assertInstanceOf(BaseServiceStub::class, $stub->service);
    }

    public function testDeclarationWithArray(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => [
                'class' => BaseServiceStub::class,
            ],
        ]);

        $this->assertInstanceOf(BaseServiceStub::class, $stub->service);
    }

    public function testMissingClassElement(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => [],
        ]);

        $this->expectException(InvalidConfigException::class);
        $stub->service;
    }

    public function testWrongServiceInterface(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => new class()
            {
            },
        ]);

        $this->expectException(InvalidConfigException::class);
        $stub->service;
    }

    public function testServiceNotExistedClass(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => 'FooBar',
        ]);

        $this->expectException(InvalidConfigException::class);
        $stub->service;
    }

    public function testBaseModelServiceInitialization(): void
    {
        $stub = new ModelBaseServiceStub();
        $stub->setServicesConfig([
            'service' => BaseModelServiceStub::class,
        ]);

        $this->assertSame($stub, $stub->service->getModel());
    }
}
