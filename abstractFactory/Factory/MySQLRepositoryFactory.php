<?php

declare(strict_types=1);

namespace AbstractFactory\Factory;

use AbstractFactory\Contract\DBConnectionRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Repository\PostgresDBRecordRepository;
use AbstractFactory\Repository\PostgresDBConnectionRepository;
use AbstractFactory\Db\MySQL;

/**
 * Class PostgresRepositoryFactory Класс-фабрика, реализующий интерфейс
 * абстрактной фабрики. Данный класс будет создавать репозитории, которые
 * работают с postgres-БД.
 * @package Factory
 */
class MySQLRepositoryFactory implements RepositoryFactoryInterface
{
    /**
     * @var MySQL
     */
    private $MySQLConnection;

    /**
     * PostgresRepositoryFactory constructor.
     * @param MySQL $postgresConnection
     */
    public function __construct(MySQL $MySQLConnection)
    {
        $this->MySQLConnection = $MySQLConnection;
    }

    /**
     * @return DBRecordRepositoryInterface
     */
    public function createDBRecordRepository(): DBRecordRepositoryInterface
    {
        return new MySQLDBRecordRepository($this->MySQLConnection);
    }

    /**
     * @return DBConnectionRepositoryInterface
     */
    public function createDBConnectionRepository(): DBConnectionRepositoryInterface
    {
        return new MySQLDBConnectionRepository($this->MySQLConnection);
    }
}
