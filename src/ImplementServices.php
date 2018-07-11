<?php
/**
 * Created by PhpStorm.
 * User: Yarmaliuk Mikhail
 * Date: 24.01.2018
 * Time: 12:10
 */

namespace MP\Services;

use yii\base\BaseObject;
use yii\base\UnknownMethodException;
use yii\base\UnknownPropertyException;

/**
 * Trait    ImplementServices
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 *
 * @mixin BaseObject
 */
trait ImplementServices
{
    /**
     * @var array
     */
    private $servicesInstances = [];

    /**
     * Array classname services
     *
     * @return array
     */
    public static function services(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        try {
            return parent::__get($name);
        } catch (UnknownPropertyException $exception) {
            if ($service = $this->getService($name)) {
                return $service;
            }

            throw new UnknownPropertyException('', 0, $exception);
        }
    }

    /**
     * @inheritdoc
     */
    public function __call($name, $params)
    {
        try {
            return parent::__call($name, $params);
        } catch (UnknownMethodException $exception) {
            $sName = lcfirst(substr($name, 3, strlen($name)));

            if ($service = $this->getService($sName, (array) $params)) {
                return $service;
            }

            throw new UnknownMethodException('', 0, $exception);
        }
    }

    /**
     * Get service by name
     *
     * @param string $name
     * @param array  $params
     *
     * @return IService|null
     */
    private function getService(string $name, array $params = []): ?IService
    {
        $className = $this->getClassName($name);

        if ($className === NULL) {
            return NULL;
        }

        if (!isset($this->servicesInstances[$name])) {
            $this->servicesInstances[$name] = new $className($this, isset($params[0]) && is_array($params[0]) ? $params[0] : []);
        }

        return $this->servicesInstances[$name];
    }

    /**
     * Get service class name
     *
     * @param string $name
     *
     * @return string|null
     */
    private function getClassName(string $name): ?string
    {
        return static::services()[$name] ?? NULL;
    }
}
