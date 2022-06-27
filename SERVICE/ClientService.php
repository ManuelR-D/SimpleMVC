<?php

class ClientService
{
    /** @var IEntityCRUDDao */
    private $dao;
    //Dependency injection to make test easier
    function __construct(IEntityCRUDDao $dependency = null)
    {
        $this->dao = $dependency ?: new ClientDAOMySQL();
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
