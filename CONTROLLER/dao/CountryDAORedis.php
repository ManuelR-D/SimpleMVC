<?php

class CountryDAORedis extends EntityCRUDDao
{
    //Define these in connection
    /** @var string */
    protected $key_prefix;
    /** @var string */
    protected $lastId;
    /** @var Redis */
    protected $dbConnection;

    /** @var SysvSemaphore */
    private $mutex;
    const MUTEX_KEY = 58599781;
    function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->key_prefix = "country_";
        $this->lastId = $this->lastId . "lastId";
        $this->dbConnection = new Redis();
        $this->dbConnection->connect("localhost", 6379);
        $this->dbConnection->auth("");
        $this->mutex = sem_get(self::MUTEX_KEY);
    }

    public function getFromId(int $id): ?ICountryDTO
    {
        $value = $this->dbConnection->get($this->key_prefix . $id);
        if (empty($vale))
            return null;
        $value = json_decode($value);
        return new CountryDTO($id, $value->name, $value->phone, (int)$value->countryId);
    }

    public function save(ICountryDTO $country): bool
    {
        sem_acquire($this->mutex);
        $country = FactoryCountry::createFromJson([
            "id" => $this->getLastClientId() + 1,
            "name" => $country->getName()
        ]);
        $this->dbConnection->set($this->key_prefix . ($this->getLastClientId() + 1), $country->jsonSerialize());
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
    public function update(ICountryDTO $updatedCountry)
    {
        sem_acquire($this->mutex);
        $this->save($updatedCountry);
        sem_release($this->mutex);
    }

    protected function closeConnection()
    {
        $this->dbConnection->close();
        sem_remove($this->mutex);
    }
}
