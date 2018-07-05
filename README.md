# yii2-services
Extension provide very simply use services for models and controllers

## Installation

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

## Usage

Once the extension is installed, simply use it in your code by:

Create service for model:

```php
use MP\Services\BaseModelService;

/**
 * ...
 *
 * @property SampleModel $model
 */
class MyCustomService extends BaseModelService
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

use MP\Services\ImplementServices;

/**
 * Use services in model
 * ...
 *
 * Services
 * @property MyCustomService $customService
 */
class SampleModel extends ActiveRecord
{
    use ImplementServices;
    
    /**
     * @inheritdoc
     */
    public function services(): array
    {
        return [
            'customService1' => MyCustomService::class,
            'customService2' => [
                'class' => MyCustomService::class,
                'property1' => 'value1',
                'property2' => 'value2',
            ],
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

For controllers, everything is the same, only the service is inherited from **BaseControllerService**


## Change Log

### 3.0

- Allow configure services in yii2 behavior-like config
- Make `services()` method non-static - allows `$this` context in services definitions

### 2.0

- Restrict services - must extend BaseService class
