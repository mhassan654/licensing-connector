<?php

namespace Mhassan654\LicensingConnector\Facades;

use Illuminate\Support\Facades\Facade;

class LicensingConnector extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'licensing-connector';
    }
}
