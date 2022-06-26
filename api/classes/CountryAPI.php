<?php

class CountryAPI
{
    /** @var CountryService */
    private $service;
    function __construct(ClientService $dependency = null)
    {
        $this->service = $dependency ?: new CountryService();
    }
    function get(int $id): ?ICountryDTO
    {
        $service = new CountryService();
        return $service->getCountryFromId($id);
    }
    function save(string $name): bool
    {
        $service = new CountryService();
        return $service->saveCountry([
            "name" => $name
        ]);
    }
    function delete(int $id)
    {
        $service = new CountryService();
        $service->delete($id);
    }
    function update(int $id, string $name)
    {
        $service = new CountryService();
        $service->update([
            "id" => $id,
            "name" => $name,
        ]);
    }
    function getAll()
    {
        return json_encode($this->service->getAllAvailableCountries(), JSON_PRETTY_PRINT);
    }
}
