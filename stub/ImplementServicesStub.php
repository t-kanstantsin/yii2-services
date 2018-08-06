<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub;

use MP\Services\ImplementServices;

/**
 * Trait ImplementServicesStub
 *
 * Note: getServicesInstances is now public for testing
 *
 * @package MP\Services\Stub
 */
trait ImplementServicesStub
{
    use ImplementServices {
        getServicesInstances as public;
    }
}