<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub\Services;

use MP\Services\BaseService;
use MP\Services\Stub\ImplementServicesStub;

/**
 * Class InheritServiceStub represent service that have own services
 *
 * @package MP\Services\Stub
 *
 * @property BaseServiceStub $service
 */
class InheritServiceStub extends BaseService
{
    use ImplementServicesStub;

    /**
     * @inheritdoc
     */
    public function services(): array
    {
        return [
            'service' => BaseServiceStub::class,
        ];
    }
}