<?php

use PHPUnit\Framework\TestCase;

class UnitTestFactoryClientTest extends TestCase
{
    public function testCreateClientWithoutId()
    {
        $client = FactoryClient::createFromJson([
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]);
        $this->assertEquals($client->getName(), "John Doe");
        $this->assertEquals($client->getPhone(), "123456");
        $this->assertEquals($client->getCountryId(), 1);
        $this->assertEquals($client->getId(), -1);
    }
    public function testCreateClientWithId()
    {
        $client = FactoryClient::createFromJson([
            "id" => 1,
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]);
        $this->assertEquals($client->getName(), "John Doe");
        $this->assertEquals($client->getPhone(), "123456");
        $this->assertEquals($client->getCountryId(), 1);
        $this->assertEquals($client->getId(), 1);
    }
}
