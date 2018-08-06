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
 * Class ModelNoServiceStub
 */
class ModelNoServiceStub extends BaseObject
{
    use ImplementServicesStub;

    /**
     * @var array
     */
    private $servicesConfig = [];

    /**
     * @inheritdoc
     */
    public function services(): array
    {
        return $this->servicesConfig;
    }

    /**
     * @param array $config
     */
    public function setServicesConfig(array $config): void
    {
        $this->servicesConfig = $config;
    }
}