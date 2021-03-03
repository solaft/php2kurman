<?php

declare(strict_types=1);

namespace AbstractFactory\Contract;

use AbstractFactory\Entity\DBConnection;

/**
 * Interface OrderRepositoryInterface Интерфейс описывающий как должен работать
 * репозиторий по управлению заказами. Здесь нет упоминания о том, куда мы
 * будем сохранять заказ, здесь определены лишь методы для работы с заказом.
 * Куда сохранять эти заказы будет решает тот класс, который будет этот
 * интерфейс реализовывать.
 * @package Contract
 */
interface DBConnectionRepositoryInterface
{
    /**
     * @param DBConnection $DBConnection
     * @return void
     */
    public function add(DBConnection $DBConnection);

    /**
     * @param DBConnection $DBConnection
     * @return void
     */
    public function delete(DBConnection $DBConnection);

    /**
     * @param DBConnection $DBConnection
     * @return void
     */
    public function update(DBConnection $DBConnection);
}