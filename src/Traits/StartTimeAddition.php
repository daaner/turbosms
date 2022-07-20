<?php

namespace Daaner\TurboSMS\Traits;

use Carbon\Carbon;

trait StartTimeAddition
{
    /**
     * @see https://turbosms.ua/api.html
     */
    protected $startTime;

    /**
     * @param  string|Carbon  $startTime
     * @return $this
     */
    public function setStartTime($startTime)
    {
        //ошибка в дате отправки, игнорируем установку
        if (! $startTime instanceof Carbon) {
            try {
                $startTime = Carbon::createFromFormat('Y-m-d H:i', $startTime);
            } catch (\Exception $e) {
                return $this;
            }
        }

        //дата уже прошла, игнорируем установку и отправляем сейчас
        if ($startTime <= Carbon::now()) {
            return $this;
        }

        if (config('turbosms.sleep_mode') && config('turbosms.max_hour') > config('turbosms.min_hour')) {
            // уже поздно, отправляем завтра утром
            if ($startTime->hour > config('turbosms.max_hour')) {
                $startTime = $startTime->addDay()->hour(config('turbosms.min_hour'));
            }
            //сегодня рано, отправляем позже
            if ($startTime->hour < config('turbosms.min_hour')) {
                $startTime = $startTime->hour(config('turbosms.min_hour'));
            }
        }

        $this->startTime = $startTime->format('Y-m-d H:i');

        return $this;
    }
}
