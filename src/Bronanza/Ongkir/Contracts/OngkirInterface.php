<?php

namespace Bronanza\Ongkir\Contracts;


interface OngkirInterface
{
    /**
     * Get shipment cost based on weight and location.
     *
     * @param int $originId
     * @param int $rajaongkirCityId
     * @param int $weight
     * @param string $courier
     * @return mixed[] - Array of costs objects.
     */
    public function getCosts($originId, $rajaongkirCityId, $weight, $courier);

    /**
     * Get available provinces.
     *
     * @return mixed[] - Array of province objects.
     */
    public function getAvailableProvinces();

    /**
     * Get all available cities.
     *
     * @return mixed[] - Array of city objects.
     */
    public function getAllAvailableCities();

    /**
     * Get available cities for the given province code.
     *
     * @param string $provinceCode - The province code got from
     *     ShipmentInterface::getAvailableProvinces()
     * @return mixed[] - Array of cities objects.
     */
    public function getAvailableCities($provinceCode);

    /**
     * Get available districts for the given province code.
     *
     * @param string $cityCode - The city code got from
     *     ShipmentInterface::getAvailableCities()
     * @return mixed[] - Array of districts objects.
     */
    public function getAvailableSubDistricts($cityCode);

}