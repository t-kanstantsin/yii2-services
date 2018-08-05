<?php

namespace MP\Services\Stub;

use MP\Services\BaseService;

class InheritServiceStub extends BaseService
{
    use ImplementServicesStub;

    public function services(): array
    {
        return [
            'baseService' => BaseServiceStub::class,
        ];
    }
}