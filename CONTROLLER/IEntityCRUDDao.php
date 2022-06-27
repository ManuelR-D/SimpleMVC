<?php

interface IEntityCRUDDao
{
    public function getFromId(int $id);
    public function delete(int $id);
    //$object should be any DTO!
    public function save(object $object);
    public function update(object $object);
}
