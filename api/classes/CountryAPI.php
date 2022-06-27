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
        return $this->service->getCountryFromId($id);
    }
    function save(string $name): bool
    {
        return $this->service->saveCountry([
            "name" => $name
        ]);
    }
    function delete(int $id)
    {
        $this->service->delete($id);
    }
    function update(int $id, string $name)
    {
        $this->service->update([
            "id" => $id,
            "name" => $name,
        ]);
    }
    function getAll()
    {
        return json_encode($this->service->getAllAvailableCountries(), JSON_PRETTY_PRINT);
    }
}
