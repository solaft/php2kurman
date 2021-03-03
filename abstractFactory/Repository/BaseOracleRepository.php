<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Db\Oracle;

/**
 * Class BaseRedisRepository Абстрактный класс для каждого репозитория,
 * который будет работать с redis-БД. Здесь будет храниться соединение с БД.
 * @package Repository
 */
abstract class BaseOracleRepository
{
    /**
     * @var Oracle
     */
    private $oracleConnection;

    /**
     * BaseRedisRepository constructor.
     * @param Redis $redisConnection
     */
    public function __construct(Oracle $oracleConnection)
    {
        $this->oracleConnection = $oracleConnection;
    }

    /**
     * @return Oracle
     */
    public function getOracleConnection(): Oracle
    {
        return $this->oracleConnection;
    }
}