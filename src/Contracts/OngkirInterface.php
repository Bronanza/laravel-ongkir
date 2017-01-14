<?php namespace Bronanza\LaravelOngkir\Contracts;


interface OngkirInterface
{
    /**
     * Get shipment cost based on weight and location.
     *
     * @param string $originId
     * @param string $rajaongkirCityId
     * @param int $weight
     * @param string $courier
     * @return mixed[] - Array of costs objects.
     */
    public function getCosts($originId, $rajaongkirCityId, $weight, $courier);

    /**
     * Get all available provinces.
     *
     * @return mixed[] - Array of province objects.
     */
    public function getAllAvailableProvinces();

    /**
     * Get all available cities.
     *
     * @return mixed[] - Array of city objects.
     */
    public function getAllAvailableCities();

    /**
     * Get available cities for the given province code.
     *
     * @param string $provinceCode
     * @return mixed[] - Array of cities objects.
     */
    public function getAvailableCities($provinceCode);
}