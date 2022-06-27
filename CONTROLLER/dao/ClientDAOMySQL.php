<?php

class ClientDAOMySQL extends IEntityCRUDDao
{
    /**
     * @var mysqli
     */
    private $dbConnection;

    const DB = 'test';
    const TABLE = 'client';
    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, self::DB, 3306);
    }

    public function getFromId(int $id): ?IClientDTO
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = '" . $id . "';";
        $result = $this->dbConnection->query($sql)->fetch_assoc();
        if (empty($result))
            return null;
        return new ClientDTO($result['id'], $result['name'], $result['phone'], $result['countryId']);
    }

    public function save(IClientDTO $client): bool
    {
        $sql = "INSERT INTO client (name,phone,countryId) VALUES ('" . $client->getName() . "', '" . $client->getPhone() . "', '" . $client->getCountryId() . "');";
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
    public function update(IClientDTO $updatedClient)
    {
        //Should use a framework to build the sql..
        $sql = "UPDATE " . self::TABLE
            . " SET " . " name = '" . $updatedClient->getName() . "',"
            . " phone = '" . $updatedClient->getPhone() . "',"
            . " countryId = '" . $updatedClient->getCountryId() . "'"
            . " WHERE id = '" . $updatedClient->getId() . "';";
        echo $sql;
        $this->dbConnection->query($sql);
    }
}
