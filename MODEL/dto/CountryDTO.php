<?php

class CountryDTO implements ICountryDTO
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        //This is insecure, we are exposing the entire object, use for testing only.
        $vars = get_object_vars($this);
        return json_encode($vars);
    }
}
