<?php

class FactoryClient
{
    public static function createFromJson(array $json): IClientDTO
    {
        return new ClientDTO(
            array_key_exists('id', $json) ? $json['id'] : -1,
            $json['name'],
            $json['phone'],
            $json['countryId']
        );
    }
}
