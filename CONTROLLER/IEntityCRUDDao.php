<?php

abstract class EntityCRUDDao
{
    public abstract function getFromId(int $id);
    public abstract function delete(int $id);
    //Replace IAnyDTO honoring the Liskov substitution!
    public abstract function save(IAnyDTO $object): bool;
    public abstract function update(IAnyDTO $object);
}
