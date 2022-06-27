<?php

use PHPUnit\Framework\TestCase;

class ClientServiceTest extends TestCase
{
    public function testGetClient()
    {
        $client = new ClientDTO(1, "John Doe", "123456", 1);
        $mockDao = $this->createMock(IEntityCRUDDao::class);
        $mockDao->method('getFromId')->willReturn($client);
        $mockDao->expects($this->exactly(1))->method('getFromId');

        $service = new ClientService($mockDao);
        $actualClient = $service->getClientFromId(1);
        $this->assertEquals($client->jsonSerialize(), $actualClient->jsonSerialize());
    }
    public function testSaveClient()
    {
        $mockDao = $this->createMock(IEntityCRUDDao::class);
        $mockDao->method('save')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('save');

        $service = new ClientService($mockDao);
        $this->assertEquals($service->saveClient([
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]), true);
    }
    public function testDeleteClient()
    {
        $mockDao = $this->createMock(IEntityCRUDDao::class);
        $mockDao->method('delete')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('delete');

        $service = new ClientService($mockDao);
        $this->assertEquals($service->delete(1), true);
    }
    public function testUpdateClient()
    {
        $mockDao = $this->createMock(IEntityCRUDDao::class);
        $mockDao->method('update')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('update');

        $service = new ClientService($mockDao);
        $this->assertEquals($service->update([
            "id" => 1,
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]), true);
    }
}
