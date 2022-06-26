<?php

class CountryDAOMySQL
{
    /**
     * @var mysqli
     */
    private $dbConnection;

    const DB = 'test';
    const TABLE = 'country';
    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, self::DB, 3306);
    }

    public function getFromId(int $id): ?ICountryDTO
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = " . $id;
        $result = $this->dbConnection->query($sql)->fetch_assoc();
        if (empty($result))
            return null;
        return new CountryDTO($result['id'], $result['name']);
    }

    public function save(ICountryDTO $country): bool
    {
        $sql = "INSERT INTO " . self::TABLE . " (name) VALUES ('" . $country->getName() . "');";
        if (!$this->dbConnection->query($sql)) {
            return false;
        }
        return true;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM " . self::TABLE . " WHERE id = " . $id . ";";
        $this->dbConnection->query($sql);
    }

    public function update(ICountryDTO $updatedCountry)
    {
        $sql = "UPDATE " . self::TABLE
            . " SET name = '" . $updatedCountry->getName() . "'"
            . " WHERE id = '" . $updatedCountry->getId() . "';";
        $this->dbConnection->query($sql);
    }
    public function getAllCountries(): array
    {
        $sql = "SELECT * FROM " . self::TABLE;
        $result = $this->dbConnection->query($sql)->fetch_all();
        return !empty($result) ? $result : [];
    }
}
