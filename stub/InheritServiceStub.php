<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub;

use MP\Services\BaseService;

/**
 * Class InheritServiceStub represent service that have own services
 *
 * @package MP\Services\Stub
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
            'baseService' => BaseServiceStub::class,
        ];
    }
}