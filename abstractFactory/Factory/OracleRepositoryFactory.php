<?php

declare(strict_types=1);

namespace AbstractFactory\Factory;

use AbstractFactory\Contract\DBConnectionRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Repository\OracleDBConnectionRepository;
use AbstractFactory\Repository\OracleDBRecordRepository;
use AbstractFactory\Db\Oracle;

/**
 * Class RedisRepositoryFactory Класс-фабрика, реализующий интерфейс
 * абстрактной фабрики. Данный класс будет создавать репозитории, которые
 * работают с redis-БД.
 * @package Factory
 */
class OracleRepositoryFactory implements RepositoryFactoryInterface
{
    /**
     * @var Oracle
     */
    private $oracleConnection;

    /**
     * RedisRepositoryFactory constructor.
     * @param Oracle $postgresConnection
     */
    public function __construct(Oracle $postgresConnection)
    {
        $this->oracleConnection = $postgresConnection;
    }

    /**
     * @return DBconnectionRepositoryInterface
     */
    public function createDBConnectionRepository(): DBConnectionRepositoryInterface
    {
        return new OracleDBConnectionRepository($this->oracleConnection);
    }

    /**
     * @return DBRecordRepositoryInterface
     */
    public function createOrderRepository(): DBRecordRepositoryInterface
    {
        return new OracleDBRecordRepository($this->oracleConnection);
    }
}