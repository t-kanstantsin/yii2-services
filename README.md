# yii2-services
Extension provide very simply use services for models and controllers

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist matthew-p/yii2-services "*"
```

or add

```
"matthew-p/yii2-services": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by:

Create service for model:

```php
use MP\Services\MPBaseModelService;

/**
 * ...
 *
 * @property SampleModel $model
 */
class MyCustomService extends MPBaseModelService
{
    /**
     * My simple method
     *
     * @return array
     */
    public function getSampleMethod(): array
    {
        return [];
    }
}
```

Create model:

```php
...

use MP\Services\MPImplementServices;

/**
 * Use services in model
 * ...
 *
 * Services
 * @property MyCustomService $customService
 */
class SampleModel extends ActiveRecord
{
    use MPImplementServices;
    
    /**
     * @inheritdoc
     */
    public static function services(): array
    {
        return [
            'customService' => MyCustomService::class,
        ];
    }
    
    ...
}
```

And use:
```php
$model = new SampleModel();
$model->customService->getSampleMethod();
```

For controllers, everything is the same, only the service is inherited from **MPBaseControllerService**