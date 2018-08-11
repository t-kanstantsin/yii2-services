<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub\Models;

use MP\Services\Stub\ImplementServicesStub;
use MP\Services\Stub\Services\BaseControllerServiceStub;
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