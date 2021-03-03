<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Db\MySQL;

/**
 * Class BaseRedisRepository Абстрактный класс для каждого репозитория,
 * который будет работать с redis-БД. Здесь будет храниться соединение с БД.
 * @package Repository
 */
abstract class BaseMySQLRepository
{
    /**
     * @var MySQL
     */
    private $MySQLConnection;

    /**
     * BaseRedisRepository constructor.
     * @param MySQL $redisConnection
     */
    public function __construct(MySQL $MySQLConnection)
    {
        $this->MySQLConnection = $MySQLConnection;
    }

    /**
     * @return MySQL
     */
    public function getOracleConnection(): MySQL
    {
        return $this->MySQLConnection;
    }
}