<?php

namespace MP\Services\Stub;

use MP\Services\BaseModelService;

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
