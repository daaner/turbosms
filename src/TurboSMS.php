<?php

namespace Daaner\TurboSMS;

use Daaner\TurboSMS\Contracts\TurboSMSInterface;
use Daaner\TurboSMS\Traits\StartTimeAddition;
use Daaner\TurboSMS\Traits\ViberAddition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class TurboSMS implements TurboSMSInterface
{
    use ViberAddition, StartTimeAddition;

    protected $api;
    protected $viberSender;
    protected $smsSender;
    protected $startTime;
    protected $isTest;

    protected $baseUri = 'https://api.turbosms.ua/';

    /**
     * TurboSMS constructor main settings.
     */
    public function __construct()
    {
        $this->getApi();
        $this->getViberSender();
        $this->getSMSSender();
        $this->isTest = config('turbosms.test_mode');
    }

    /**
     * @return int|null
     */
    public function getBalance(): ?int
    {
        $balance = null;
        $module = 'user';
        $method = 'balance.json';

        $url = $this->baseUri.$module.'/'.$method;
        $body = [];

        $answers = $this->getResponse($url, $body);

        if (isset($answers['result']['balance'])) {
            $balance = $answers['result']['balance'];
        }

        return $balance;
    }

    /**
     * @return array
     */
    public function getBalanceJson(): array
    {
        $module = 'user';
        $method = 'balance.json';

        $url = $this->baseUri.$module.'/'.$method;
        $body = [];

        return $this->getResponse($url, $body);
    }

    /**
     * @param  string|array  $messageId
     * @return array
     */
    public function getItemsStatus($messageId): array
    {
        $module = 'message';
        $method = 'status.json';

        $messages = collect($messageId)->values()->all();

        $url = $this->baseUri.$module.'/'.$method;
        $body = [
            'messages' => $messages,
        ];

        return $this->getResponse($url, $body);
    }

    /**
     * @param  string|array  $recipients
     * @param  string  $text
     * @param  string|null  $type
     * @return array
     */
    public function sendMessages($recipients, string $text, string $type = null): array
    {
        $module = 'message';
        $method = 'send.json';

        if (! $text) {
            return [
                'success' => false,
                'result' => null,
                'info' => __('turbosms::turbosms.empty_text'),
            ];
        }

        $phone = collect($recipients);
        $phones = $this->phonesTrim($phone);
        $phones = $phones->values()->all();

        $url = $this->baseUri.$module.'/'.$method;
        $body = [
            'recipients' => $phones,
        ];

        //SMS
        if ($type == 'sms' || ! $type) {
            $body = $this->bodySMS($body, $text);
        }
        //VIBER
        if ($type == 'viber') {
            $body = $this->bodyViber($body, $text);
        }
        //Гибридная доставка
        if ($type == 'both') {
            $body = $this->bodySMS($body, $text);
            $body = $this->bodyViber($body, $text);
        }

        //Доставка в определенное время
        if ($this->startTime) {
            $body['start_time'] = $this->startTime;
        }

        return $this->getResponse($url, $body);
    }

    /**
     * @param  string  $url
     * @param  array  $body
     * @return array
     */
    public function getResponse(string $url, array $body): array
    {
        if ($this->isTest) {
            return [
                'success' => false,
                'result' => [
                    'url' => $url,
                    'body' => $body,
                ],
                'info' => __('turbosms::turbosms.test_mode'),
            ];
        }

        $response = Http::timeout(config('turbosms.http_response_timeout', 3))
            ->retry(config('turbosms.http_retry_max_time', 2), config('turbosms.http_retry_delay', 200))
            ->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->api,
                'Content-Type' => 'application/json',
            ])->post($url, $body);

        if ($response->failed()) {
            return [
                'success' => false,
                'result' => null,
                'info' => __('turbosms::turbosms.error_data'),
            ];
        }

        $answer = $response->json();
        if (! isset($answer['response_result']) || ! $answer['response_result']) {
            $error = __('turbosms::turbosms.response_status.'.$answer['response_status']);

            return [
                'success' => false,
                'result' => null,
                'info' => $error,
            ];
        }

        $info = __('turbosms::turbosms.response_status.'.$answer['response_status']);

        return [
            'success' => true,
            'result' => $answer['response_result'],
            'info' => $info,
        ];
    }

    // =================== SUPPORT ===================

    /**
     * @return string
     */
    public function getApi(): string
    {
        if (is_null($this->api)) {
            $this->api = (string) config('turbosms.api_key');
        }

        return $this->api;
    }

    /**
     * @param  string  $api
     * @return $this
     */
    public function setApi(string $api): self
    {
        $this->api = $api;

        return $this;
    }

    /**
     * @return string
     */
    public function getViberSender(): string
    {
        if (is_null($this->viberSender)) {
            $this->viberSender = (string) config('turbosms.viber_sender');
        }

        return $this->viberSender;
    }

    /**
     * @param  string  $viberSender
     * @return $this
     */
    public function setViberSender(string $viberSender): self
    {
        $this->viberSender = $viberSender;

        return $this;
    }

    /**
     * @return string
     */
    public function getSMSSender(): ?string
    {
        if (is_null($this->smsSender)) {
            $this->smsSender = config('turbosms.sms_sender');
        }

        return $this->smsSender;
    }

    /**
     * @param  string  $smsSender
     * @return $this
     */
    public function setSMSSender(string $smsSender): self
    {
        $this->smsSender = $smsSender;

        return $this;
    }

    /**
     * Убираем у телефонов пробелы, скобки, минусы и плюсы.
     *
     * @param  Collection  $phones
     * @return Collection $phones
     */
    public function phonesTrim(Collection $phones): Collection
    {
        $phones->transform(function ($item) {
            return preg_replace('/[^0-9]/', '', $item);
        });

        return $phones;
    }

    /**
     * Формируем $body для SMS.
     *
     * @param  array  $body
     * @param  string  $text
     * @return array $body
     */
    public function bodySMS(array $body, string $text): array
    {
        $body['sms'] = [
            'sender' => $this->smsSender,
            'text' => $text,
        ];

        return $body;
    }

    /**
     * Формируем $body для Viber.
     *
     * @param  array  $body
     * @param  string  $text
     * @return array $body
     */
    public function bodyViber(array $body, string $text): array
    {
        $msg = $text;
        if ($this->viberReplaceText) {
            $msg = $this->viberReplaceText;
        }

        $body['viber'] = [
            'sender' => $this->viberSender,
            'text' => $msg,
        ];

        if ($this->ttl) {
            $body['viber']['ttl'] = $this->ttl;
        }
        if ($this->imageUrl) {
            $body['viber']['image_url'] = $this->imageUrl;
        }
        if ($this->caption) {
            $body['viber']['caption'] = $this->caption;
        }
        if ($this->action) {
            $body['viber']['action'] = $this->action;
        }
        if ($this->countClicks) {
            $body['viber']['count_clicks'] = $this->countClicks;
        }
        if ($this->isTransactional) {
            $body['viber']['is_transactional'] = $this->isTransactional;
        }

        return $body;
    }
}
