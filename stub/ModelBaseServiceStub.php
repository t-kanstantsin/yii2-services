<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub;

use yii\base\BaseObject;

/**
 * Class ObjectStub
 *
 * @property BaseServiceStub $service
 */
class ModelBaseServiceStub extends BaseObject
{
    use ImplementServicesStub;

    public function services(): array
    {
        return [
            'service' => BaseServiceStub::class,
        ];
    }
}