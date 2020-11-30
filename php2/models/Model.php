<?php
namespace app\models;
use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = new Db();
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }
}