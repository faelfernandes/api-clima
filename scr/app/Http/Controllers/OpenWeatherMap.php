<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenWeatherMap extends Controller
{
    /**
     * API Base URL
     * @var string
     */
    const BASE_URL = 'https://api.openweathermap.org';

    /**
     * API access key
     * @var string
     */
    private $apiKey;

    /**
     * Method responsible for constructing the class by setting the API key
     * @param string $apiKey
     */
    public function __construct()
    {
        $this->apiKey = config('app.api_key');
    }

    /**
     * Method responsible for obtaining the current climate of a city in Brazil
     * @param string $city
     * @return array
     */
    public function getCityTemperatureInformation($city)
    {
        $city = $this->getEndpoint('/data/2.5/weather', [
            'q' => $city
        ]);

        if ($city['cod'] !== 200) {
            return $city->json();
        }

        return [
            "city_name"     => $city['name'],
            "country_code"  => $city['sys']['country'],
            "temp"          => $city['main']['temp'],
            "temp_min"      => $city['main']['temp_min'],
            "temp_max"      => $city['main']['temp_max'],
            "cod"           => 200
        ];
    }

    /**
     * Method responsible for executing the Culstar GET in the Open Wather Map API
     * @param string $resource
     * @param array $params
     * @return array
     */
    private function getEndpoint($resource, $params = [])
    {
        $params['units'] = 'metric';
        $params['appid'] = $this->apiKey;
        $endpoint = self::BASE_URL . $resource . '?' . http_build_query($params);
        return Http::get($endpoint);
    }
}
