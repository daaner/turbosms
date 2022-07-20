<?php

namespace Daaner\TurboSMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static int getBalance()
 * @method static array getItemsStatus($messageId)
 * @method static array getResponse($url, $body)
 * @method static array sendMessages($recipients, $text, $type = null)
 * @method static array getResponse($url, $body)
 * @method static void setApi($api)
 * @method static void setSMSSender($smsSender)
 * @method static void setViberSender($viberSender)
 * @method static void setStartTime($startTime)
 * @method static void setViberText($viberReplaceText)
 * @method static void setTTL($ttl)
 * @method static void setImageURL($image)
 * @method static void setCaption($caption)
 * @method static void setAction($action)
 * @method static void setCountClicks($countClicks)
 * @method static void setTransactional($isTransactional)
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
