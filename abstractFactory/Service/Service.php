<?php

declare(strict_types=1);

namespace AbstractFactory\Service;

use AbstractFactory\Contract\DBConnectionRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Entity\DBConnection;
use AbstractFactory\Entity\DBRecord;

/**
 * Class Service Класс-сервис (в данном случае он один для примера), будет
 * предоставлять доступ до каких-то действий с данными, здесь должна быть
 * прописана бизнес-логика приложения (мы это пропустили, т.к. это пример).
 * Для корректной работы данного сервиса, необходим доступ к данным, данные
 * могут храниться в redis или postgres (возможно и в других хранилищах).
 * Данный сервис не должен знать о том откуда эти данные мы будем получать,
 * сервис должен просто обратиться к репозиторию и репозиторий должен вернуть
 * данные. Мы точно не знаем какой репозиторий будет у нас в свойствах
 * $userRepository и $orderRepository, будут ли они работать с redis или
 * postgres, но мы точно знаем что эти репозитории будут предоставлять интерфейс
 * для работы, а именно UserRepositoryInterface и OrderRepositoryInterface.
 * А значит мы точно сможем получить данные, откуда - в данном сервисе не важно.
 * @package Service
 */
class Service
{
    /**
     * @var DBRecordRepositoryInterface
     */
    private $DBRecordRepository;
    /**
     * @var DBRecordRepositoryInterface
     */
    private $DBRecordRepository;

    /**
     * OrderService constructor. В конструктор передается фабрика, которая может
     * нам создать любой репозиторий, который нам нужен. Данная фабрика уже
     * знает, с каким хранилищем должны работать репозитории, которые она будет
     * создавать. При вызове данного конструктора передается фабрика, которая
     * создат репозитории определенного типа, которые работают с определенным
     * хранилищем.
     * @param RepositoryFactoryInterface $repositoryFactory
     */
    public function __construct(RepositoryFactoryInterface $repositoryFactory)
    {
        $this->DBRecordRepository = $repositoryFactory->createDBRecordRepository();
        $this->DBConnectionRepository = $repositoryFactory->createDBConnectionRepository();
    }

    /**
     * Действия для добавления пользователя (просто пример использования).
     */
    public function addDBRecord(): void {
        // С помощью другой фабрики можно собрать пользователя, что было
        // пропущено для упрощения.
        $user = new DBRecord();
        // Добавляем пользователя в хранилище.
        $this->DBRecordRepository->add($DBRecord);
    }

    /**
     * Действия для добавления заказа (просто пример использования).
     */
    public function addDBConnection(): void {
        // С помощью другой фабрики можно собрать заказ, что было
        // пропущено для упрощения.
        $order = new DBConnection();
        // Добавляем заказ в хранилище.
        $this->DBConnectionRepository->add($DBConnection);
    }
}