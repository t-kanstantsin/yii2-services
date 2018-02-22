<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 31.10.2017
 * Time: 15:53
 */

namespace common\components;

/**
 * Class    MPBaseControllerService
 * @package common\components
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 */
abstract class MPBaseControllerService
{
    /**
     * @var
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