<?php namespace Bronanza\LaravelOngkir;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Config\Repository as Config;
use Bronanza\LaravelOngkir\Contracts\OngkirInterface;

class Ongkir implements OngkirInterface
{
    /**
     * The http client.
     *
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Default options
     */
    private $defaultOptions;

    /**
     * Mapping to rajaongkir.com API
     *
     * @var array[string]string
     */
    private $apiEndPoints = [
        'provinces' => '/province',
        'cities' => '/city',
        'subDistricts' => '/subdistrict',
        'costs' => '/cost'
    ];

    public function __construct(HttpClient $client, Config $config)
    {
        $this->httpClient = $client;
        $this->api = $config->get('ongkir.api');
        $this->defaultOptions = [
            'headers' => [
                'key' => $config->get('ongkir.apiKey')
            ]
        ];
    }

    /**
     * Create options with default options.
     * @param array $options
     * @return array
     */
    private function options(array $options)
    {
        return array_merge($this->defaultOptions, $options);
    }

    /**
     * Extract result from rajaongkir API response
     * @param string $response;
     * @return mixed[]
     */
    private function result($response)
    {
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true)['rajaongkir']['results'];
    }

    /**
     * Create api url for raja ongkir
     * @param string $endPoint
     * @return string
     */
    public function api($endPointKey)
    {
        $endPoint = $this->apiEndPoints[$endPointKey];

        return $this->api . $endPoint;
    }

    /**
     * Get shipment cost based on weight and location.
     *
     * @param int $originId
     * @param int $rajaongkirCityId
     * @param int $weight
     * @param string $courier
     * @return mixed[] - Array of costs objects.
     */
    public function getCosts($originId, $rajaongkirCityId, $weight, $courier)
    {
        $options = $this->options([
            'form_params' => [
                'origin' => $originId,
                'destination' => $rajaongkirCityId,
                'weight' => $weight,
                'courier' => $courier
            ]
        ]);

        $response = $this->httpClient->post($this->api('costs'), $options);

        return $this->result($response);
    }

    /**
     * Get available provinces.
     *
     * @return stdClass - Array of province objects.
     */
    public function getAvailableProvinces()
    {
        $response = $this->httpClient->get(
            $this->api('provinces'),
            $this->defaultOptions
        );

        return $this->result($response);
    }

    /**
     * Get all available cities.
     *
     * @return stdClass - Array of city objects.
     */
    public function getAllAvailableCities()
    {
        $response = $this->httpClient->get(
            $this->api('cities'),
            $this->defaultOptions
        );

        return $this->result($response);
    }

    /**
     * Get available cities for the given province code.
     *
     * @param string $provinceCode - The province code got from
     *     RajaOngkir::getAvailableProvinces()
     * @return mixed[] - Array of cities objects.
     */
    public function getAvailableCities($provinceCode)
    {
        $options = $this->options([
            'query' => [
                'province' => $provinceCode
            ]
        ]);

        $response = $this->httpClient->get($this->api('cities'), $options);

        return $this->result($response);
    }

    /**
     * Get available districts for the given province code.
     *
     * @param string $cityCode - The city code got from
     *     RajaOngkir::getAvailableCities()
     * @return mixed[] - Array of districts objects.
     */
    public function getAvailableSubDistricts($cityCode)
    {
        $options = $this->options([
            'query' => [
                'city' => $cityCode
            ]
        ]);

        $response = $this->httpClient->get($this->api('subDistricts'), $options);

        return $this->result($response);
    }
}