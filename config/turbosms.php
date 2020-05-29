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
      * Регистрация бесплатнаю но занимает продолжительное время
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

];
