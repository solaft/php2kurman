<?php

declare(strict_types=1);

namespace AbstractFactory\Contract;

use AbstractFactory\Entity\DBRecord;

/**
 * Interface UserRepositoryInterface Интерфейс описывающий как должен работать
 * репозиторий по управлению пользователями. Здесь нет упоминания о том, куда
 * мы будем сохранять пользователя, здесь определены лишь методы для работы с
 * пользователями.
 * Куда сохранять этих пользователей будет решает тот класс, который будет этот
 * интерфейс реализовывать.
 * @package Contract
 */
interface DBRecordRepositoryInterface
{
    /**
     * @param DBRecord $DBRecord
     * @return void
     */
    public function add(DBRecord $DBRecord);

    /**
     * @param DBRecord $DBRecord
     * @return void
     */
    public function delete(DBRecord $DBRecord);

    /**
     * @param DBRecord $DBRecord
     * @return void
     */
    public function update(DBRecord $DBRecord);
}