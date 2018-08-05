<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.07.18
 * Time: 0:30
 */

namespace MP\Services\Stub;

/**
 * Class InheritServiceModelStub
 *
 * @property InheritServiceStub $inheritService
 */
class InheritServiceModelStub
{
    use ImplementServicesStub;

    public function services(): array
    {
        return [
            'inheritService' => InheritServiceStub::class,
        ];
    }
}