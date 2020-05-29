# Laravel TurboSMS API gateway http://turbosms.ua

Send SMS and Viber message via TurboSMS ([turbosms.ua](https://turbosms.ua/)) using this Laravel framework package ([Laravel](https://laravel.com)).


#### Laravel > 7, PHP >= 7.2.5


## Installation

Require this package with composer.

[ru] Установите пакет через композер.

``` bash
composer require daaner/turbosms
```


If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`

[ru] Если вы не используете автоопределение - добавьте сервис провайдер в конфигурационный файл.

```php
Daaner\TurboSMS\TurboSMSServiceProvider::class,
```


Add the `TurboSMS` facade to your facades array:

[ru] Если нужно - добавьте фасад:

```php
'TurboSMS' => Daaner\TurboSMS\Facades\TurboSMS::class,
```


Copy the package config to your local config with the publish command:

[ru] Выполните публикацию ассетов командой:

``` bash
php artisan vendor:publish --provider="Daaner\TurboSMS\TurboSMSServiceProvider"
```

## Configuration

Once you have published the configuration files, please edit the config file in `config/turbosms.php`.

- Create an account on [turbosms.ua](https://turbosms.ua)
- Add your project, copy the `HTTP API`, params and paste into `config/turbosms.php`
- After the configuration has been published, edit `config/turbosms.php`

__NOTE__
На странице настройки шлюза обязательно нужно получить токен API и включить галочку `HTTP API`


## Usage and API

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

Настройки для отправки через __Viber__ или для __гибридной__ отправки ([Более детально](https://turbosms.ua/api.html))
- `setViberText($viberReplaceText)` - `string` замена текста в вайбер при гибридных отправках (заменяет текст и при простых отправках в Viber)
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

- `setCountClicks($countClicks)` - `string||int` Флаг статистики переходов (1 - да, остальное - нет)
```php
TurboSMS::setCountClicks(1);
```

- `setTransactional($isTransactional)` - `string||int` Флаг транзакционного сообщения (1 - да, остальное - нет)
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

#### Получение статуса `message_id` принимает `array || string`

```php
$status = TurboSMS::getItemStatus($messageId);

//or
$arr = collect();
$arr->push('FIRST_MESSAGE_ID');
$arr->push('SECOND_MESSAGE_ID');
$arr->push('XXX_MESSAGE_ID');
$status = TurboSMS::getItemStatus($$arr);

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
      "message_id" => "c91a1593-5eca-0cd0-cab1-a41c8a9a22c2"
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
$sended = TurboSMS::sendMessages('+38(066) 777-88-99', 'Гибридная отправка. Сразу в Viber, если не прийдет - уйдет SMS', 'both');

dd($sended);
```



## Добавить

[ ] - Проверка даты меньше текущей


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daan](https://github.com/daaner)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
