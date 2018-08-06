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
 * Class ModelNoServiceStub default class without services
 * @package MP\Services\Stub
 */
class ModelNoServiceStub extends BaseObject
{
    use ImplementServicesStub;

    /**
     * Config may be overrode with setter
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
     * Setter for [[servicesConfig]]
     * @param array $config
     */
    public function setServicesConfig(array $config): void
    {
        $this->servicesConfig = $config;
    }
}