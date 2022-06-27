<?php

class CountryDAOMySQLIntegrationTest extends FreshStartTestCase
{

    public function testSaveCountry()
    {
        $dao = new StubCountryDAOMySQL();
        $country = new CountryDTO(1, "Wonderland");
        $dao->save($country);
        $savedCountry = $dao->getFromId(1);

        $this->assertEquals($savedCountry->jsonSerialize(), $country->jsonSerialize());
    }

    public function testDeleteCountry()
    {
        $dao = new StubCountryDAOMySQL();
        $country = new CountryDTO(1, "Wonderland");
        $dao->save($country);
        $savedCountry = $dao->getFromId(1);
        $dao->delete(1);
        $afterDelete = $dao->getFromId(1);
        $this->assertEquals(is_null($afterDelete), true);
        $this->assertEquals(is_null($savedCountry), false);
    }

    public function testUpdateCountry()
    {
        $dao = new StubCountryDAOMySQL();
        $country = new CountryDTO(1, "Wonderland");
        $dao->save($country);
        $updatedCountry = new CountryDTO(1, "Argentina");
        $dao->update($updatedCountry);
        $updatedCountryFromDB = $dao->getFromId(1);

        $this->assertEquals($updatedCountry->jsonSerialize(), $updatedCountryFromDB->jsonSerialize());
    }
}
