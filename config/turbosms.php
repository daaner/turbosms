<?php

return [

    /**
     * @see https://turbosms.ua/route.html
     * Текущий токен HTTP API авторизации
     * Выдается на после регистрации на странице настроек шлюза
     */
    'test_mode' => env('TURBOSMS_TEST_MODE', true),

    /**
     * @see https://turbosms.ua/route.html
     * Текущий токен HTTP API авторизации
     * Выдается на после регистрации на странице настроек шлюза
     */
    'api_key' => env('TURBOSMS_API_KEY', 'test_api_key'),

    /**
     * @see https://turbosms.ua/sign.html
     * Можно зарегистрировать своего отправителя, с которого будет приходить SMS
     * Регистрация бесплатная но занимает продолжительное время
     * Можно использовать уже готовых
     *
     * Supported: "MAGAZIN", "Market", "TAXI", "SERVIS TAXI",
     *            "Dostavka24", "IT Alarm", "Post Master"
     */
    'sms_sender' => env('TURBOSMS_SMS_SENDER', 'Market'),

    /**
     * @see https://turbosms.ua/viber/show/senders.html
     * Можно зарегистрировать своего отправителя,
     * Регистрация бесплатная, долгая и возможно будет минимальный лимит в месяц
     *
     * Supported: "Mobibon"
     */
    'viber_sender' => env('TURBOSMS_VIBER_SENDER', 'Mobibon'),

    /**
     * Выключенное значение позволяет отправлять сообщения в любое время дня
     * Установив "true" - параметр $start_time меняется по условию "min_hour" и "max_hour".
     */
    'sleep_mode' => false,

    /**
     * Минимальный и максимальный час разрешенной отправки сообщения
     * Преобразование времени затрагивает только часы, минуты остаются те же.
     *
     * Пример:
     * min = 9 (09:00), max = 21 (21:00)
     * 1) Сообщения назначенные на 22:47 будут оправляться в 9:47 завтрашнего дня.
     * 2) Сообщения назначенные на 07:15 будут оправляться в 9:15 утра.
     * 3) Сообщения назначенные на 06:59 будут оправляться в 9:59 (почти в 10 часов дня).
     * 4) Сообщения назначенные на 19:59 будут оправляться в 19:59, как и указано.
     */
    'min_hour' => 9,
    'max_hour' => 21,

    /**
     * Тонкая настройка HTTP client.
     *
     * http_response_timeout - maximum number of seconds to wait for a response
     * http_retry_max_time - the maximum number of times the request should be attempted
     * http_retry_delay - the number of milliseconds that Laravel should wait in between attempts
     */
    'http_response_timeout' => 3,
    'http_retry_max_time' => 2,
    'http_retry_delay' => 200,

];
