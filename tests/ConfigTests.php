<?php

use MP\Services\Stub\ModelBaseServiceStub;
use MP\Services\Stub\ModelConfigAsArrayStub;
use MP\Services\Stub\ModelConfigMissingClassStub;
use MP\Services\Stub\ModelConfigNumberStub;
use PHPUnit\Framework\TestCase;

class ConfigTests extends TestCase
{
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
