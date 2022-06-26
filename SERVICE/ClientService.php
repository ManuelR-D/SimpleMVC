<?php

class ClientService
{
    private $dao;
    function __construct()
    {
        $this->dao = new ClientDAOMySQL();
    }
    public function saveClient(array $jsonSerializedClient): bool
    {
        $client = FactoryClient::createFromJson($jsonSerializedClient);
        return $this->dao->save($client);
    }
    public function getClientFromId(int $id): ?IClientDTO
    {
        return $this->dao->getFromId($id);
    }
    public function delete(int $id)
    {
        return $this->dao->delete($id);
    }
    public function update(array $jsonSerializedClient)
    {
        $client = FactoryClient::createFromJson($jsonSerializedClient);
        return $this->dao->update($client);
    }
}
