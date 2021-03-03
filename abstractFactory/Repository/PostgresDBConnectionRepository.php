<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Entity\DBRecord;

/**
 
 * @package Repository
 */
class PostgresDBConnectionRepository extends BasePostgresRepository
    implements DBRecordRepositoryInterface
{
    /**
     * @param DBConnection $DBConnection
     */
    public function add(DBConnection $DBConnection
    {
     
    }

    /**
     * @param DBConnection $DBConnection
     */
    public function delete(DBConnection $DBConnection)
    {
     
    }

    /**
     * @param DBConnection $DBConnection
     */
    public function update(DBConnection $DBConnection)
    {
        
    }
}