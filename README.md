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

Create service for model (must implement IService or extend any of services in MP\Services):

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

For controllers, everything is the same, only the service is inherited from **BaseControllerService**


## Tests

Run tests with command:

```bash
./vendor/bin/phpunit
```
