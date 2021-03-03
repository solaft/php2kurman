<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\DBRecordRepositoryInterface;
use AbstractFactory\Entity\DBRecord;

/**
 
 * @package Repository
 */
class OracleDBRecordRepository extends BaseOracleRepository
    implements DBRecordRepositoryInterface
{
    /**
     * @param DBRecord $dbrecord
     */
    public function add(DBRecord $dbrecord)
    {
     
    }

    /**
     * @param DBRecord $dbrecord
     */
    public function delete(DBRecord $dbrecord)
    {
     
    }

    /**
     * @param DBRecord $dbrecord
     */
    public function update(DBRecord $dbrecord)
    {
        
    }
}