<?php

use PHPUnit\Framework\TestCase;

class CountryServiceTest extends TestCase
{
    public function testGetCountry()
    {
        $country = new CountryDTO(1, "Wonderland");
        $mockDao = $this->createMock(CountryDAOMySQL::class);
        $mockDao->method('getFromId')->willReturn($country);
        $mockDao->expects($this->exactly(1))->method('getFromId');

        $service = new CountryService($mockDao);
        $actualCountry = $service->getCountryFromId(1);
        $this->assertEquals($country->jsonSerialize(), $actualCountry->jsonSerialize());
    }
    public function testSaveCountry()
    {
        $mockDao = $this->createMock(CountryDAOMySQL::class);
        $mockDao->method('save')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('save');

        $service = new CountryService($mockDao);
        $this->assertEquals($service->saveCountry([
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]), true);
    }
    public function testDeleteCountry()
    {
        $mockDao = $this->createMock(CountryDAOMySQL::class);
        $mockDao->method('delete')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('delete');

        $service = new CountryService($mockDao);
        $this->assertEquals($service->delete(1), true);
    }
    public function testUpdateCountry()
    {
        $mockDao = $this->createMock(CountryDAOMySQL::class);
        $mockDao->method('update')->willReturn(true);
        $mockDao->expects($this->exactly(1))->method('update');

        $service = new CountryService($mockDao);
        $this->assertEquals($service->update([
            "id" => 1,
            "name" => "John Doe",
            "phone" => "123456",
            "countryId" => 1
        ]), true);
    }
}
