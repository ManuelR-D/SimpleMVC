<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ClientDTO implements IClientDTO
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $phone;
    /** @var int */
    private $countryId;

    public function __construct(int $id, string $name, string $phone, int $countryId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->countryId = $countryId;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getCountryId(): int
    {
        return $this->countryId;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function jsonSerialize()
    {
        //This is insecure, we are exposing the entire object, use for testing only.
        $vars = get_object_vars($this);
        return json_encode($vars);
    }
}
