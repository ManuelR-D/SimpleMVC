<?php

class StubCountryDAORedis extends CountryDAORedis
{
    protected function connect()
    {
        parent::connect();
        $this->key_prefix = "integrationTestcountry_";
        $this->lastId = $this->key_prefix . "lastId";
    }
}
