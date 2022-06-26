<?php

interface IClientDTO extends JsonSerializable
{
    public function getId(): int;
    public function getName(): string;
    public function getCountryId(): int;
    public function getPhone(): string;
}
