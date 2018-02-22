<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 31.10.2017
 * Time: 15:53
 */

namespace MP\Services;

use yii\base\Controller;

/**
 * Class    MPBaseControllerService
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 */
abstract class MPBaseControllerService
{
    /**
     * @var Controller
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
    }

    private function __clone()
    {
    }
}