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
        $this->creatorsList[] = new CountryTableCreator();
        $this->creatorsList[] = new ClientTableCreator();
    }
    public function create(): void
    {
        foreach ($this->creatorsList as $creator) {
            $creator->create();
        }
    }
}
