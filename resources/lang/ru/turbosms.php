<?php

return [

    'error_data' => 'Ошибка получения данных',
    'test_mode' => 'Режим тестирования отправки',
    'empty_text' => 'Текст сообщения не указан',


    'response_status' => [
        //0
        'OK' => 'Запрос обработан успешно',

        //1
        'PONG' => 'Успешный результат вызова метода ping',

        //103
        'REQUIRED_TOKEN' => 'Отсутствует токен аутентификации',

        //104
        'REQUIRED_CONTENT' => 'Отсутствуют данные запроса',

        //105
        'REQUIRED_AUTH' => 'Аутентификация не пройдена, не верный токен',

        //106
        'REQUIRED_ACTIVE_USER' => 'Пользователь заблокирован, работа с API невозможна до разблокировки',

        //200
        'REQUIRED_MESSAGE_SENDER' => 'Отсутствует или пустой параметр отправителя сообщения',

        //201
        'REQUIRED_MESSAGE_TEXT' => 'Отсутствует или пустой параметр текста сообщения',

        //202
        'REQUIRED_MESSAGE_RECIPIENT' => 'Отсутствует или пустой список получателей сообщения',

        //203
        'REQUIRED_BALANCE' => 'Не достаточно кредитов на балансе для создания рассылки',

        //204
        'REQUIRED_MESSAGE_BUTTON' => 'Отсутствуют или пустые параметры кнопки в сообщении, когда она обязательна',

        //205
        'REQUIRED_MESSAGE_BUTTON_CAPTION' => 'Отсутствует или пустой параметр текста на кнопке в сообщении',

        //206
        'REQUIRED_MESSAGE_BUTTON_ACTION' => 'Отсутствует или пустой параметр URL адреса, куда перейдёт получатель сообщения при нажатии на кнопку',

        //300
        'INVALID_REQUEST' => 'Неверный запрос, проверьте его структуру и корректность данных',

        //301
        'INVALID_TOKEN' => 'Неверный токен аутентификации',

        //302
        'INVALID_MESSAGE_SENDER' => 'Неверный отправитель сообщения',

        //303
        'INVALID_START_TIME' => 'Неверная дата отложенной отправки сообщения',

        //304
        'INVALID_MESSAGE_TEXT' => 'Недопустимое значение текста сообщения. Возвращается если передано не строковое значение или кодировка символов не входит в набор UTF-8',

        //305
        'INVALID_PHONE' => 'Недопустимый номер получателя, система не смогла распознать страну и оператора получателя',

        //306
        'INVALID_TTL' => 'Недопустимое значение параметра ttl, значение должно быть целочисленным и не представлено в виде строки',

        //306
        'INVALID_MESSAGE_ID' => 'Недопустимое значение параметра message_id, неверный формат',

        //400
        'NOT_ALLOWED_MESSAGE_SENDER' => 'Не разрешённый отправитель для текущего пользователя',

        //401
        'NOT_ALLOWED_MESSAGE_SENDER_NOT_ACTIVE' => 'Отправитель разрешён, но не активирован на данный момент (не оплачено использование в текущем месяце, не завершена регистрация и т.п.)',

        //402
        'NOT_ALLOWED_MESSAGE_IMAGE' => 'Недопустимый тип файла изображения',

        //403
        'NOT_ALLOWED_START_TIME' => 'Недопустимая дата отложенной отправки сообщения (выходит за пределы установленных ограничений)',

        //404
        'NOT_ALLOWED_NUMBER_STOPLIST' => 'Номер получателя находится в стоплисте (для sms) или в игнорлисте (для Viber), отправка невозможна',

        //405
        'NOT_ALLOWED_RECIPIENTS_LIMIT' => 'Недопустимое количество получателей',

        //406
        'NOT_ALLOWED_RECIPIENT_COUNTRY' => 'Недопустимая страна получателя. У пользователя не активирована возможность отправлять сообщения получателям данной страны. Для активации такой возможности свяжитесь с нашим отделом поддержки клиентов',

        //407
        'NOT_ALLOWED_RECIPIENT_DUPLICATE' => 'Получатель уже присутствует в рассылке, дубликаты игнорируются',

        //408
        'NOT_ALLOWED_MESSAGE_BUTTON_TEXT_LENGTH' => 'Текст на кнопке слишком длинный, длопускается не более 30 символов',

        //409
        'NOT_ALLOWED_MESSAGE_TTL' => 'Недопустимое значение параметра ttl (выходит за пределы установленных ограничений)',

        //410
        'NOT_ALLOWED_MESSAGE_TRANSACTION_CONTENT' => 'Недопустимый контент в транзакционном сообщении. В таких сообщениях можно отправлять только текст, а кнопка и изображения запрещены',

        //411
        'NOT_ALLOWED_MESSAGE_DATA' => 'Какой-то из параметров имеет недопустимое значение, свяжитесь с нашим отделом поддержки клиентов для выяснения деталей',

        //412
        'NOT_ALLOWED_MESSAGE_TEXT' => 'Текст содержит запрещённые фрагменты',

        //413
        'NOT_ALLOWED_MESSAGE_TEXT_LENGTH' => 'Превышена допустимая длина текста сообщения',

        //414
        'NOT_ALLOWED_MESSAGE_ID' => 'Данные сообщения с переданным message_id недоступны для текущего пользователя',

        //415
        'NOT_ALLOWED_MESSAGE_TRANSACTION_SENDER' => 'Запрещено отправлять транзакционные сообщения от общего отправителя',

        //500
        'FAILED_CONVERT_RESULT2JSON' => 'Не удалось сконвертировать данные результата в JSON формат, незамедлительно свяжитесь с нашим отделом поддержки клиентов для выяснения деталей',

        //501
        'FAILED_CONVERT_RESULT2XML' => 'Не удалось сконвертировать данные результата в XML формат, незамедлительно свяжитесь с нашим отделом поддержки клиентов для выяснения деталей',

        //502
        'FAILED_PARSE_BODY' => 'Не удалось распознать тело запроса (неверный формат)',

        //503
        'FAILED_SMS_SEND' => 'Не удалось отправить SMS сообщение',

        //504
        'FAILED_VIBER_SEND' => 'Не удалось отправить Viber сообщение',

        //505
        'FAILED_SAVE_IMAGE' => 'Не удалось сохранить изображение',

        //800
        'SUCCESS_MESSAGE_ACCEPTED' => 'Сообщения успешно созданы и добавлены в очередь отправки. Некоторые сообщения могут попадать на предварительную модерацию',

        //801
        'SUCCESS_MESSAGE_SENT' => 'Сообщения успешно отправлены',

        //802
        'SUCCESS_MESSAGE_PARTIAL_ACCEPTED' => 'Сообщения успешно созданы и добавлены в очередь отправки, но некоторые получатели не попали в список рассылки, детали смотрите в ответе',

        //803
        'SUCCESS_MESSAGE_PARTIAL_SENT' => 'Сообщения успешно отправлены, но некоторые получатели не попали в список рассылки, детали смотрите в ответе',

        //999
        'FATAL_ERROR' => 'Ошибка выполнения запроса, свяжитесь с отделом поддержки для выяснения деталей',
    ],

];
