<?php

class CountryDAORedis extends IEntityCRUDDao
{
    /** @var Redis */
    private $dbConnection;
    /** @var SysvSemaphore */
    private $mutex;
    const KEY_PREFIX = "country_";
    const LAST_ID = self::KEY_PREFIX . "lastId";
    const MUTEX_KEY = 58599781;
    function __construct()
    {
        $this->dbConnection = new Redis();
        $this->dbConnection->connect("localhost", 6379);
        $this->dbConnection->auth("");
        $this->mutex = sem_get(self::MUTEX_KEY);
    }

    public function getFromId(int $id): ?IClientDTO
    {
        $value = $this->dbConnection->get(self::KEY_PREFIX . $id);
        $value = json_decode($value);
        return new ClientDTO($id, $value->name, $value->phone, (int)$value->countryId);
    }

    public function save(IClientDTO $client): bool
    {
        sem_acquire($this->mutex);
        $client = FactoryClient::createFromJson([
            "id" => $this->getLastClientId() + 1,
            "name" => $client->getName(),
            "phone" => $client->getPhone(),
            "countryId" => $client->getCountryId()
        ]);
        $this->dbConnection->set(self::KEY_PREFIX . ($this->getLastClientId() + 1), $client->jsonSerialize());
        $this->dbConnection->incr(self::LAST_ID);
        sem_release($this->mutex);
        return true;
    }

    private function getLastClientId(): int
    {
        return $this->dbConnection->get(self::LAST_ID);
    }

    public function delete(int $id)
    {
        sem_acquire($this->mutex);
        $this->dbConnection->del(self::KEY_PREFIX . $id);
        sem_release($this->mutex);
    }
    public function update(IClientDTO $updatedClient)
    {
        sem_acquire($this->mutex);
        $this->save($updatedClient);
        sem_release($this->mutex);
    }

    function __destruct()
    {
        $this->dbConnection->close();
        sem_remove($this->mutex);
    }
}
