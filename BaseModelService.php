<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 31.10.2017
 * Time: 15:53
 */

namespace MP\Services;

/**
 * Class    BaseService
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 */
class BaseModelService extends BaseService
{
    /**
     * @var \yii\db\ActiveRecordInterface
     */
    protected $model;

    /**
     * BaseModelService constructor.
     *
     * @param $model
     *
     * @return void
     */
    public function __construct($model, array $params = [])
    {
        $this->model = $model;

        parent::__construct($params);
    }

    /**
     * Save model
     *
     * @param bool $runValidation
     * @param null $attributeNames
     *
     * @return BaseModelService
     */
    public function save($runValidation = true, $attributeNames = null): self
    {
        $this->model->save($runValidation, $attributeNames);

        return $this;
    }
}