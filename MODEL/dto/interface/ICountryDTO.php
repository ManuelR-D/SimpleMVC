<?php

interface ICountryDTO extends JsonSerializable
{
    public function getId(): int;
    public function getName(): string;
}
