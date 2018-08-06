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
 * Class ControllerStub
 *
 * @package MP\Services\Stub
 */
class ControllerStub extends BaseObject
{
    use ImplementServicesStub;

    /**
     * @inheritdoc
     */
    public function services(): array
    {
        return [
            'service' => BaseControllerServiceStub::class,
        ];
    }
}