<?php


namespace app\models\repositories;


use app\base\Application;
use app\models\Record;
use app\services\Db;

abstract class Repository
{
    /** @var Db|null  */
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = Application::getInstance()->db;
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return  $this->getQuery($sql,[]);
    }

    /**
     * @param int $id
     * @return Record
     */
    public function getById(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return  $this->getQuery($sql, [':id' => $id])[0];
    }

    public function delete(Record $record)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $record->id]);
    }

    public function insert(Record $record)
    {
        $tableName = $this->getTableName();

        $params = [];
        $columns = [];

        foreach ($record as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }


    public function update(Record $record)
    {

    }

    public function save(Record $record)
    {
        if(is_null($record->id)) {
            $this->insert($record);
        }else {
            $this->update($record);
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return Record[]
     */
    protected function getQuery($sql, $params = []) {
        return Application::getInstance()->db
            ->queryAll($sql,$params, $this->getRecordClassname());
    }

    abstract public function getTableName(): string;

    abstract public function getRecordClassname(): string;

}