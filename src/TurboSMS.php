<?php

namespace Daaner\TurboSMS;

use Illuminate\Support\Facades\Http;

class TurboSMS
{

    protected $api;
    protected $base_uri = 'https://api.turbosms.ua/';

    /**
     * TurboSMS constructor.
     */
    public function __construct()
    {
        $this->api = config('turbosms.api_key');
    }

    /**
     * @return integer
     */
    public function getBalance()
    {
        $module = 'user';
        $method = 'balance.json';

        $url = $this->base_uri . $module . '/' . $method;
        $body = [];

        $answers = $this->getResponse($url, $body);

        return $answers;
    }



    public function getResponse($url, $body) {
      $response = Http::timeout(3)
          ->retry(2, 200)
          ->withHeaders([
              'Accept' => 'application/json',
              'Authorization' => 'Bearer ' . $this->api,
              'Content-Type' => 'application/json',
          ])->post($url, $body);

        if ($response->failed()) {
            return [
                'success' => false,
                'result' => null,
                'info' => __('turbosms.error_data'),
            ];
        }

        $answer = $response->json();
        if (!$answer['response_result']) {
            $error = __('turbosms.response_status.' . $answer['response_status']);
            return [
                'success' => false,
                'result' => null,
                'info' => $error,
            ];
        }

        return [
            'success' => true,
            'result' => $answer['response_result'],
            'info' => '',
        ];
    }

}
