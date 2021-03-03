<?php

declare(strict_types=1);

namespace AbstractFactory;

use AbstractFactory\Factory\PostgresRepositoryFactory;
use AbstractFactory\Factory\OracleRepositoryFactory;
use AbstractFactory\Factory\MySQLRepositoryFactory;
use AbstractFactory\Db\Postgres;
use AbstractFactory\Db\Oracle;
use AbstractFactory\Db\MySQL;
use AbstractFactory\Service\Service;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^AbstractFactory/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

// Создаваться экземпляр класса будет фреймворком, через DI (dependency
// injection), автоматом, используя DIC (dependency injection container).
// Здесь же мы создаем фабрики ручками.
// Для работы нашего Service нуобходима фабрика, которая будет создавать
// репозитории, мы создаем эти фабрики руками. Service не будет знать откуда
// берутся данные, из какого хранилища.
// Хочу отметить, что более правильно в Service передавать сразу репозитории,
// а не фабрику, которая эти репозитории будет создавать. Используя DIC,
// можно было бы настроить DI так, что все репозитории создавались бы используя
// данную абстрактную фабрику, но этот момент упрощен.
// Хранилища у нас два, postgres и redis, два варианта использования:

// Если мы храним данные в базе данных.
// ------------------------------------
// Создаем фабрику, которая будет нам создавать репозитории, которые будут
// работать через базу данных.
$postgresRepositoryFactory = new PostgresRepositoryFactory(new Postgres());
// Создаем сервис, который использует репозитории, передаем ему фабрику,
// чтоб сервис мог сам попросить фабрику создать нужные репозитории.
$serviceWithPostgresRepositories = new Service($postgresRepositoryFactory);
// Выполняем действия
$serviceWithPostgresRepositories->addDBConnection();
$serviceWithPostgresRepositories->addDBRecord();

// Если мы храним данные в памяти.
// ------------------------------------
// Создаем фабрику, которая будет нам создавать репозитории, которые будут
// работать используя redis.
$oracleRepositoryFactory = new OracleRepositoryFactory(new Oracle());
// Создаем сервис, который используем репозитории, передаем ему фабрику,
// чтоб сервис мог сам попросить фабрику создать нужные репозитории.
$serviceWithOracleRepositories = new Service($oracleRepositoryFactory);
// Выполняем действия
$serviceWithOracleRepositories->addDBConnection();
$serviceWithOracleRepositories->addDBRecord();

$MySQLRepositoryFactory = new MySQLRepositoryFactory(new MySQL());
// Создаем сервис, который использует репозитории, передаем ему фабрику,
// чтоб сервис мог сам попросить фабрику создать нужные репозитории.
$serviceWithMySQLRepositories = new Service($MySQLRepositoryFactory);
// Выполняем действия
$serviceWithMySQLRepositories->addDBConnection();
$serviceWithMySQLRepositories->addDBRecord();

// Если мы храним данные в памяти.
// ------------------------------------
// Создаем фабрику, которая будет нам создавать репозитории, которые будут
// работать используя redis.
$MySQLRepositoryFactory = new MySQLRepositoryFactory(new MySQL());
// Создаем сервис, который используем репозитории, передаем ему фабрику,
// чтоб сервис мог сам попросить фабрику создать нужные репозитории.
$serviceWithMySQLRepositories = new Service($MySQLRepositoryFactory);
// Выполняем действия
$serviceWithMySQLRepositories->addDBConnection();
$serviceWithMySQLRepositories->addDBRecord();