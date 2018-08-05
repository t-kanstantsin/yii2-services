<?php

namespace MP\Services\Stub;

use MP\Services\ImplementServices;

trait ImplementServicesStub
{
    use ImplementServices {
        getServicesInstances as public;
    }
}