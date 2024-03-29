<?php

class DBDestroyerDAO
{
    private $dbConnection;
    function __construct()
    {
        $this->connect();
    }
    function connect()
    {
        $dbhost = "localhost";
        $dbuser = "integrationTest";
        $dbpass = "1234";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, "integrationtestdb", 3306);
    }
    function truncateAll()
    {
        $sql = "TRUNCATE client;";
        $sql2 = "DELETE FROM country;";
        $sql3 = "ALTER TABLE country AUTO_INCREMENT = 1;";
        $this->dbConnection->query($sql);
        $this->dbConnection->query($sql2);
        $this->dbConnection->query($sql3);
        $this->dbConnection->close();

        $this->dbConnection = new Redis();
        $this->dbConnection->connect("localhost", 6379);
        $this->dbConnection->auth("");
        $this->dbConnection->set("integrationTestcountry_lastId", 0);
        $this->dbConnection->set("integrationTestclient_lastId", 0);
        $this->dbConnection->set("integrationTestcountry_1", null);
        $this->dbConnection->set("integrationTestclient_1", null);
        $this->dbConnection->close();
    }
}
