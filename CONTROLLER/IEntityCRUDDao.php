<?php

abstract class IEntityCRUDDao
{
    public abstract function getFromId(int $id);
    public abstract function delete(int $id);
    //$object should be any DTO!
    public abstract function save(object $object): bool;
    public abstract function update(object $object);
}
