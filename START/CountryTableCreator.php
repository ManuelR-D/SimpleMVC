<?php


class CountryTableCreator implements ICreator
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
        $sql = 'CREATE TABLE IF NOT EXISTS country(
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
        );';
        if(!$this->dbConnection->query($sql)){
            echo "FAIL AL CREAR country: (" . $this->dbConnection->errno. " ) " . $this->dbConnection->error;
        }
    }
}
