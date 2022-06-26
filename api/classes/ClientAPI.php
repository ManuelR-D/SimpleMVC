<?php

class ClientAPI
{
    /** @var ClientService */
    private $service;

    //Receives the service as dependency injection for testing if needed
    function __construct(ClientService $dependency = null)
    {
        $this->service = $dependency ?: new ClientService();
    }
    function get(int $id): ?IClientDTO
    {
        return $this->service->getClientFromId($id);
    }
    function save(string $name, string $phone, int $countryId): bool
    {
        return $this->service->saveClient([
            "name" => $name,
            "phone" => $phone,
            "countryId" => $countryId
        ]);
    }
    function delete(int $id)
    {
        $this->service->delete($id);
    }
    function update(int $id, string $name, string $phone, int $countryId)
    {
        $this->service->update([
            "id" => $id,
            "name" => $name,
            "phone" => $phone,
            "countryId" => $countryId
        ]);
    }
}
