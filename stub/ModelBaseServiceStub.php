<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub;

/**
 * Class ModelBaseServiceStub class with [[service]] defined
 *
 * @package MP\Services\Stub
 *
 * @property BaseServiceStub $service
 * @method BaseServiceStub getService()
 */
class ModelBaseServiceStub extends ModelNoServiceStub
{
    /**
     * ModelBaseServiceStub constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->setServicesConfig([
            'service' => BaseServiceStub::class,
        ]);
    }
}