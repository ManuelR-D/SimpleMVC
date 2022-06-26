<?php

class FactoryCountry
{
    public static function createFromJson(array $json): ICountryDTO
    {
        return new CountryDTO(
            array_key_exists('id', $json) ? $json['id'] : -1,
            $json['name']
        );
    }
}
