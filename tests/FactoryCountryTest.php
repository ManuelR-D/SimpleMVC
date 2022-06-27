<?php

use PHPUnit\Framework\TestCase;

class FactoryCountryTest extends TestCase
{
    public function testCreateCountryWithoutId()
    {
        $country = FactoryCountry::createFromJson([
            "name" => "Wonderland",
        ]);
        $this->assertEquals($country->getName(), "Wonderland");
        $this->assertEquals($country->getId(), -1);
    }
    public function testCreateCountryWithId()
    {
        $country = FactoryCountry::createFromJson([
            "id" => 1,
            "name" => "Wonderland",
        ]);
        $this->assertEquals($country->getName(), "Wonderland");
        $this->assertEquals($country->getId(), 1);
    }
}
