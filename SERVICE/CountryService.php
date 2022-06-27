<?php

class CountryService
{
    /** @var IEntityCRUDDao */
    private $dao;

    function __construct(IEntityCRUDDao $dependency)
    {
        $this->dao = $dependency ?: new CountryDAOMySQL();
    }
    public function saveCountry(array $jsonSerializedCountry): bool
    {
        $country = FactoryCountry::createFromJson($jsonSerializedCountry);
        return $this->dao->save($country);
    }
    public function getCountryFromId(int $id): ?ICountryDTO
    {
        return $this->dao->getFromId($id);
    }
    public function delete(int $id)
    {
        return $this->dao->delete($id);
    }
    public function update(array $jsonSerializedCountry)
    {
        $country = FactoryCountry::createFromJson($jsonSerializedCountry);
        return $this->dao->update($country);
    }
    public function getAllAvailableCountries(): array
    {
        return $this->dao->getAllCountries();
    }
}
