<?php

/*
    Set up the environment for the first start. 
        Create tables
*/

class Creator implements ICreator
{
    private $creatorsList;
    function __construct()
    {
        $this->creatorsList[] = new ClientTableCreator();
        $this->creatorsList[] = new CountryTableCreator();
    }
    public function create(): void
    {
        foreach ($this->creatorsList as $creator) {
            $creator->create();
        }
    }
}
