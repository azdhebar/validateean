<?php

namespace AZDhebar\ValidateEan;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AZDhebar\ValidateEan\Skeleton\SkeletonClass
 */
class ValidateEanFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validate-ean';
    }
}
