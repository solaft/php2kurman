<?php

declare(strict_types=1);

namespace AbstractFactory\Factory;

use AbstractFactory\Contract\DBConnectionRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Repository\PostgresDBRecordRepository;
use AbstractFactory\Repository\PostgresDBConnectionRepository;
use AbstractFactory\Db\Postgres;

/**
 * Class PostgresRepositoryFactory Класс-фабрика, реализующий интерфейс
 * абстрактной фабрики. Данный класс будет создавать репозитории, которые
 * работают с postgres-БД.
 * @package Factory
 */
class PostgresRepositoryFactory implements RepositoryFactoryInterface
{
    /**
     * @var Postgres
     */
    private $postgresConnection;

    /**
     * PostgresRepositoryFactory constructor.
     * @param Postgres $postgresConnection
     */
    public function __construct(Postgres $postgresConnection)
    {
        $this->postgresConnection = $postgresConnection;
    }

    /**
     * @return DBRecordRepositoryInterface
     */
    public function createDBRecordRepository(): DBRecordRepositoryInterface
    {
        return new PostgresDBRecordRepository($this->postgresConnection);
    }

    /**
     * @return DBConnectionRepositoryInterface
     */
    public function createDBConnectionRepository(): DBConnectionRepositoryInterface
    {
        return new PostgresDBConnectionRepository($this->postgresConnection);
    }
}
