<?php

use PHPUnit\Framework\TestCase;

class ClientDAORedisIntegrationTest extends FreshStartTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $dao = new StubCountryDAORedis();
        $country = new CountryDTO(1, "Wonderland");
        $dao->save($country);
    }

    public function testSaveClient()
    {
        $dao = new StubClientDAORedis();
        $client = new ClientDTO(1, "John Doe", "123456", 1);
        $dao->save($client);
        $savedClient = $dao->getFromId(1);

        $this->assertEquals($savedClient->jsonSerialize(), $client->jsonSerialize());
    }

    public function testDeleteClient()
    {
        $dao = new StubClientDAORedis();
        $client = new ClientDTO(1, "John Doe", "123456", 1);
        $dao->save($client);
        $savedClient = $dao->getFromId(1);
        $dao->delete(1);
        $afterDelete = $dao->getFromId(1);
        $this->assertEquals(is_null($afterDelete), true);
        $this->assertEquals(is_null($savedClient), false);
    }

    public function testUpdateClient()
    {
        $dao = new StubClientDAORedis();
        $client = new ClientDTO(1, "John Doe", "123456", 1);
        $dao->save($client);
        $updatedClient = new ClientDTO(1, "Natalia Natalia", "123456", 1);
        $dao->update($updatedClient);
        $updatedClientFromDB = $dao->getFromId(1);

        $this->assertEquals($updatedClient->jsonSerialize(), $updatedClientFromDB->jsonSerialize());
    }
}
