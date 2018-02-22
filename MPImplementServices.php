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
 * Trait    MPImplementServices
 * @package MP\Services
 * @author  Yarmaliuk Mikhail
 * @version 1.0
 *
 * @mixin BaseObject
 */
trait MPImplementServices
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
            // Get controller service
            if (isset(static::services()[$name])) {
                if (!isset($this->servicesInstances[$name])) {
                    $className = static::services()[$name];

                    $this->servicesInstances[$name] = new $className($this, []);
                }

                return $this->servicesInstances[$name];
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
            // Get model service
            $sName = lcfirst(substr($name, 3, strlen($name)));

            if (isset(static::services()[$sName])) {
                $className = (static::services()[$sName]);

                $this->servicesInstances[$sName] = new $className($this, is_array($params[0]) ? $params[0] : []);

                return $this->servicesInstances[$sName];
            }

            throw new UnknownMethodException('', 0, $exception);
        }
    }
}