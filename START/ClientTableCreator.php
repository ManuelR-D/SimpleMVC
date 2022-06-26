<?php


class ClientTableCreator implements ICreator
{
    private $dbConnection;
    const DB = 'test';
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "testGuest";
        $dbpass = "1234";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, self::DB);
        if($this->dbConnection->connect_errno) {
            echo "Fail";
        }
        //Select the database test
    }

    public function create(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS client(
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            phone  VARCHAR(12) NOT NULL,
            countryId BIGINT UNSIGNED NOT NULL,
            CONSTRAINT fk_client_country
                FOREIGN KEY (countryId) REFERENCES country (id)
        );';
        if(!$this->dbConnection->query($sql)){
            echo "FAIL AL CREAR client: (" . $this->dbConnection->errno. " ) " . $this->dbConnection->error;
        }
    }
}
