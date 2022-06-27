<?php

use PHPUnit\Framework\TestCase;

class ClientDAOMySQLIntegrationTest extends TestCase
{
    public function saveClient()
    {
        $dao = new StubClientDAOMySQL();
        $client = new ClientDTO(1, "John Doe", "123456", 1);
        $dao->save($client);
        $savedClient = $dao->getFromId(1);

        $this->assertEquals($savedClient->jsonSerialize(), $client->jsonSerialize());
    }
}
class StubClientDAOMySQL extends ClientDAOMySQL
{
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, "integrationtestdb", 3306);
    }
}
