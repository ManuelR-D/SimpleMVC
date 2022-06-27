<?php

class StubClientDAORedis extends ClientDAORedis
{
    protected function connect()
    {
        parent::connect();
        $this->key_prefix = "integrationTestclient_";
        $this->lastId = $this->key_prefix . "lastId";
    }
}
