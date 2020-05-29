<?php

namespace Daaner\TurboSMS\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string handle(Request $request)
 * @method static string getBalance()
 *
 * @see \Daaner\TurboSMS
 */
class TurboSMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'turbosms';
    }
}
