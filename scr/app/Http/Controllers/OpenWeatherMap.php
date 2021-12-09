<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenWeatherMap extends Controller
{
    /**
     * URL Base das APIs
     * @var string
     */
    const BASE_URL = 'https://api.openweathermap.org';

    /**
     * Chave de acesso da API
     * @var string
     */
    private $apiKey;

    /**
     * Método responsável por construir a classe definindo a chave de API
     * @param string $apiKey
     */
    public function __construct()
    {
        $this->apiKey = config('app.api_key');
    }

    /**
     * Método responsável por obter o clima atual de uma cidade no Brasil
     * @param string $city
     * @param string $state
     * @return array
     */
    public function getCityTemperatureInformation($state, $city)
    {
        $city = $this->getEndpoint('/data/2.5/weather', [
            'q' => $city . ',BR-' . $state . ',BRA'
        ]);

        if ($this->getStatus($city['cod'])) {
            return $city->body();
        }

        return [
            "data" => [
                "city_name"     => $city['name'],
                "state_code"    => $state,
                "country_code"  => $city['sys']['country'],
                "temp"          => $city['main']['temp'],
                "temp_min"      => $city['main']['temp_min'],
                "temp_max"      => $city['main']['temp_max'],
                "cod"           => 200
            ],
        ];
    }

    /**
     * Método responsável por executar a culstar GET na API do Open Wather Map
     * @param string $resource
     * @param array $params
     * @return array
     */
    private function getEndpoint($resource, $params = [])
    {
        // PARÂMETROS ADICIONAIS
        $params['units'] = 'metric';
        //$params['lang'] = 'pt_br';
        $params['appid'] = $this->apiKey;

        //ENDPOINT
        $endpoint = self::BASE_URL . $resource . '?' . http_build_query($params);
        $response = Http::get($endpoint);

        return $response;
    }

    /**
     * Método responsável por verificar se o status do retorno da API é diferente de 200
     * @param string $status
     * @return bool
     */
    public function getStatus($status)
    {
        if ($status !== 200) {
            return true;
        }
        return false;
    }
}
