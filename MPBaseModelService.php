<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 31.10.2017
 * Time: 15:53
 */

namespace MP\Services;

use yii\db\ActiveRecordInterface;

/**
 * Class    MPBaseService
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 */
abstract class MPBaseModelService
{
    /**
     * @var ActiveRecordInterface
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
    }

    private function __clone()
    {
    }

    /**
     * Save model
     *
     * @param bool $runValidation
     * @param null $attributeNames
     *
     * @return MPBaseModelService
     */
    public function save($runValidation = true, $attributeNames = null): self
    {
        $this->model->save($runValidation, $attributeNames);

        return $this;
    }
}