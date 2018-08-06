<?php

namespace MP\Services\Stub\Services;

use MP\Services\BaseModelService;

/**
 * Class BaseModelServiceStub dummy `model`-service
 *
 * @package MP\Services\Stub
 *
 * Note: public getter for protected [[model]] property required for testing
 */
class BaseModelServiceStub extends BaseModelService
{
    /**
     * @return \yii\db\ActiveRecordInterface
     */
    public function getModel()
    {
        return $this->model;
    }
}
