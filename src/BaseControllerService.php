<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 31.10.2017
 * Time: 15:53
 */

namespace MP\Services;

/**
 * Class    BaseControllerService
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 */
class BaseControllerService extends BaseService
{
    /**
     * @var \yii\base\Controller
     */
    protected $controller;

    /**
     * BaseControllerService constructor.
     *
     * @param $controller
     *
     * @return void
     */
    public function __construct($controller, array $params = [])
    {
        $this->controller = $controller;

        parent::__construct($params);
    }
}