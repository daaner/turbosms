# Laravel TurboSMS API gateway

Send SMS and Viber message via TurboSMS ([turbosms.ua](https://turbosms.ua/)) using this Laravel framework package ([Laravel](https://laravel.com)).

Удобный пакет для отправки и проверки SMS и Viber сообщений через сервис TurboSMS.ua


#### Laravel > 7, PHP >= 7.2.5
Минимальная версия Laravel `7.0`, для более низкой версии нужно использовать `guzzle/guzzle`


## Установка
Установите пакет через композер.

``` bash
composer require daaner/turbosms
```


Если вы НЕ используете autodiscover - добавьте сервис провайдер в конфигурационный файл `config/app.php`.

```php
Daaner\TurboSMS\TurboSMSServiceProvider::class,
```


Добавьте фасад `TurboSMS` в массив в `config/app.php`:

```php
'TurboSMS' => Daaner\TurboSMS\Facades\TurboSMS::class,
```


Выполните публикацию конфига и локализационных файлов командой:

``` bash
php artisan vendor:publish --provider="Daaner\TurboSMS\TurboSMSServiceProvider"
```

## Конфигураци

После публикации ресурсов поправьте файл `config/turbosms.php` и заполните `.env` новыми полями.

- Создайте аккаунт на сайте [turbosms.ua](https://turbosms.ua)
- Скопируйте `HTTP API` в настройках шлюза и добавьте в соответствующий параметр в `config/turbosms.php`

__NOTE__
На странице настройки шлюза обязательно нужно получить токен API и включить галочку `HTTP API`


## Использование и API

### API

- `setApi($apiKey)` - `string` указываем API ключ, отличный от значения в конфиге
```php
TurboSMS::setApi('MY_TURBOSMS_API_KEY_2');
```

- `setSMSSender($smsSender)` - `string` указываем отправителя SMS, отличного от значения в конфиге
```php
TurboSMS::setSMSSender('TAXI');
```

- `setViberSender($viberSender)` - `string` указываем отправителя Viber, отличного от значения в конфиге
```php
TurboSMS::setViberSender('Mobibon2');
```

- `setStartTime($startTime)` - `carbon|string` дата и время отправки сообщения.
В конфиге задается режим сна и промежуток времени. В режиме сна, сообщения будут откладываться
```php
TurboSMS::setStartTime('2020-10-10 08:22');

//or

TurboSMS::setStartTime(Carbon\Carbon::now()->addMinutes(5));
```

Настройки для отправки через __Viber__ или для __гибридной__ отправки ([Более детально](https://turbosms.ua/api.html))
- `setViberText($viberReplaceText)` - `string` замена текста в Вайбер при гибридных отправках (заменяет текст и при простых отправках в Viber)
```php
TurboSMS::setViberText('Этот текст будет получен только в Viber');
```

- `setTTL($ttl)` - `int` срок жизни сообщения (60 - 86400)
```php
TurboSMS::setTTL(86400);
```

- `setImageURL($image)` - `string` полный URL адрес изображения, которое будет отображено в сообщении
```php
TurboSMS::setImageURL('http://lorempixel.com/400/400/');
```

- `setCaption($caption)` - `string` текст на кнопке в сообщении
```php
TurboSMS::setCaption('Открыть сайт');
```

- `setAction($action)` - `string` URL адрес, куда перейдёт получатель сообщения при нажатии на кнопку
```php
TurboSMS::setAction('https://www.google.com');
```

- `setCountClicks($countClicks)` - `string|int` Флаг статистики переходов (1 - да, остальное - нет)
```php
TurboSMS::setCountClicks(1);
```

- `setTransactional($isTransactional)` - `string|int` Флаг транзакционного сообщения (1 - да, остальное - нет)
```php
TurboSMS::setTransactional(1);
```




### Methods
#### `getBalance(): return int`  - получение баланса. При ошибке возвращает `null`

```php
$balance = TurboSMS::getBalance();

//or

TurboSMS::setApi('MY_TURBOSMS_API_KEY_2');
$balance = TurboSMS::getBalance($otherApiKey);

dd($balance);

//100500.22 or null
```

#### Получение статуса `message_id` принимает `array | string`

```php
$status = TurboSMS::getItemsStatus($messageId);

//or
$arr = collect();
$arr->push('FIRST_MESSAGE_ID');
$arr->push('SECOND_MESSAGE_ID');
$arr->push('XXX_MESSAGE_ID');
$status = TurboSMS::getItemsStatus($arr);

dd($status);
```

```
[
  "success" => true
  "result" => [
    0 => [
      "message_id" => "c91a1593-****-0cd0-****-a41c8a9a22c1"
      "response_code" => 0
      "recipient" => "*****"
      "sent" => "2020-01-01 00:00:01"
      "updated" => "2020-01-01 00:00:02"
      "status" => "Delivered"
      "type" => "sms"
      "response_status" => "OK"
    ],
    1 => [
      "message_id" => "c91a1593-****-0cd0-****-a41c8a9a22c2"
      "response_code" => 414
      "response_status" => "NOT_ALLOWED_MESSAGE_ID"
    ]
    ...
  ]
  "info" => "Запрос обработан успешно"
]
```

#### Отправка сообщения(ий). Значения отправителей (телефоны) очищаются от лишних символов
`TurboSMS::sendMessages($array_or_one_phone, $text, enum['sms' || null, 'viber', 'both'])`

```php
$sended = TurboSMS::sendMessages('+38(066) 777-88-99', 'Отправляем SMS');
$sended = TurboSMS::sendMessages('+38(066) 777-88-99', 'Отправляем SMS', 'sms');

// or
$sended = TurboSMS::sendMessages('+38(066) 777-88-99', 'Отправляем Viber', 'viber');
$sended = TurboSMS::sendMessages('+38(066) 777-88-99', 'Гибридная отправка. Сразу в Viber, при ошибке - SMS', 'both');
```

#### Полностью кастомная отправка. Позволяет самому сформировать URL и тело запроса.
`TurboSMS::getResponse($url, $body)`
```php
$url = 'https://api.turbosms.ua/NEW_MODULE/NEW_METHOD';
$body = [
  ...
];
TurboSMS::setApi('MY_TURBOSMS_API_KEY_2');
$custom = TurboSMS::getResponse($url, $body);

```



## Примеры использования
```php
use TurboSMS;

...

//простая отправка
$sms = TurboSMS::sendMessages('380667778899', 'TurboSMS приветствует Вас!');
$viber = TurboSMS::sendMessages('380667778899', 'TurboSMS приветствует Вас!', 'viber');


//отправка с параметрами
//если сообщение будет получено в Вайбере, SMS отправки не произойдет
//если Вайбер на номере не доступен - будет отправлена только SMS
$ph = collect(); //массив номеров телефонов
$ph->push('+38(066) 666-55-44'); //валидный номер
$ph->push('+38 (099)a999-88-77 ');  //валидный номер
$ph->push(' телефон правильный, отправится даже с этим текстом: +38-099-11122-33 ');  //валидный номер
$ph->push('телефон с ошибкой (без кода страны): 099-111-22-33');  //невалидный номер
$ph->push('лишние цифры после номера: 38-099-333-44-33 добавочный 5'); //невалидный номер
$ph->push('лишние цифры до номера: 55 улица, 38-099-333-44-33'); //невалидный номер

TurboSMS::setViberSender('Mobibon');
TurboSMS::setSMSSender('TAXI');

TurboSMS::setTTL(86400);
TurboSMS::setImageURL('http://lorempixel.com/400/400/');
TurboSMS::setCaption('Открыть сайт с котиками');
TurboSMS::setAction('https://www.google.com');
TurboSMS::setCountClicks(1);
TurboSMS::setTransactional(1);
TurboSMS::setStartTime('lalala'); //про игнорируется
TurboSMS::setStartTime('2020-10-10 08:22'); //установит дату и время отправки, если она больше текущей
TurboSMS::setViberText('Этот текст будет получен только в Viber');
$sended = TurboSMS::sendMessages($ph, 'Привет в SMS. В Вайбере не отправится', 'both');

```



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daan](https://github.com/daaner)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
