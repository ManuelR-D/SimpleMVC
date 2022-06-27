<?php

abstract class EntityCRUDDao
{
    protected $dbConnection;
    public abstract function getFromId(int $id);
    public abstract function delete(int $id);
    //Replace IAnyDTO honoring the Liskov substitution!
    public abstract function save(IAnyDTO $object): bool;
    public abstract function update(IAnyDTO $object);
    protected abstract function connect();
    protected abstract function closeConnection();

    function __construct()
    {
        $this->connect();
    }

    function __destruct()
    {
        $this->closeConnection();
    }
}
