<?php

namespace app\services;

use app\traits\SingletonTrait;

class Db
{
    use SingletonTrait;

    public $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'php2020',
        'charset' => 'utf8'
    ];

    /** @var \PDO */
    private $connection = null;

    protected function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->buildDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }


        return $this->connection;
    }


    /**
     * @param string $sql SELECT * FROM products WHERE id = :id
     * @param array $params [':id' => 2]
     */
    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryOne(string $sql, array $params = [], string $className = null)
    {
        return $this->queryAll( $sql,  $params, $className)[0];
    }

    public function queryAll(string $sql, array $params = [], string $className = null)
    {
        $pdoStatement = $this->query($sql,  $params);
        if(isset($className)) {
            $pdoStatement->setFetchMode(
                \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
                $className
            );
        }
        return $pdoStatement->fetchAll();
    }

    public function execute(string $sql, array $params = []) : int
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function getLastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }


    private function buildDsnString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset'],
        );
    }
}