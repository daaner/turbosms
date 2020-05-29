<?php

namespace Daaner\TurboSMS;

use Illuminate\Support\Facades\Http;

class TurboSMS
{

    protected $api;
    protected $baseUri = 'https://api.turbosms.ua/';

    /**
     * TurboSMS constructor.
     */
    public function __construct()
    {
        $this->api = config('turbosms.api_key');
    }

    /**
     * @param null $api
     * @return integer
     */
    public function getBalance($api = null) {
        $module = 'user';
        $method = 'balance.json';

        $url = $this->baseUri . $module . '/' . $method;
        $body = [];

        $answers = $this->getResponse($url, $body, $api);

        return $answers;
    }



    public function getResponse($url, $body, $api = null) {

      if (!$api) {
        $api = $this->api;
      }

      $response = Http::timeout(3)
          ->retry(2, 200)
          ->withHeaders([
              'Accept' => 'application/json',
              'Authorization' => 'Bearer ' . $api,
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
