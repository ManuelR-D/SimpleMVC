<?php

class StubCountryDAOMySQL extends CountryDAOMySQL
{
    function connect()
    {
        $dbhost = "localhost";
        $dbuser = "integrationTest";
        $dbpass = "1234";

        $this->dbConnection = new mysqli($dbhost, $dbuser, $dbpass, "integrationtestdb", 3306);
    }
}
