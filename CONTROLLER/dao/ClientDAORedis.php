<?php

class ClientDAORedis extends EntityCRUDDao
{
    //Define these in connection
    /** @var string */
    protected $key_prefix;
    /** @var string */
    protected $lastId;
    /** @var Redis */
    private $dbConnection;

    /** @var SysvSemaphore */
    private $mutex;
    const MUTEX_KEY = 57189238;
    function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->key_prefix = "client_";
        $this->lastId = $this->key_prefix . "lastId";
        $this->dbConnection = new Redis();
        $this->dbConnection->connect("localhost", 6379);
        $this->dbConnection->auth("");
        $this->mutex = sem_get(self::MUTEX_KEY);
    }

    public function getFromId(int $id): ?IClientDTO
    {
        $value = $this->dbConnection->get($this->key_prefix . $id);
        if (empty($value))
            return null;
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
        $this->dbConnection->set($this->key_prefix . ($this->getLastClientId() + 1), $client->jsonSerialize());
        $this->dbConnection->incr($this->lastId);
        sem_release($this->mutex);
        return true;
    }

    private function getLastClientId(): int
    {
        return $this->dbConnection->get($this->lastId);
    }

    public function delete(int $id)
    {
        sem_acquire($this->mutex);
        $this->dbConnection->del($this->key_prefix . $id);
        sem_release($this->mutex);
    }
    public function update(IClientDTO $updatedClient)
    {
        sem_acquire($this->mutex);
        $this->dbConnection->set($this->key_prefix . $updatedClient->getId(), $updatedClient->jsonSerialize());
        sem_release($this->mutex);
    }

    function __destruct()
    {
        $this->dbConnection->close();
        sem_remove($this->mutex);
    }
}
