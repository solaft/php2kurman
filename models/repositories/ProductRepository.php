<?php


namespace app\models\repositories;


use app\models\Product;

class ProductRepository extends Repository
{
    public function getTableName(): string
    {
        return "products";
    }

    public function getRecordClassname(): string
    {
        return Product::class;
    }

    public function getByCategoryId(int $categoryId)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE category_id = :id";
        return $this->getQuery($sql, [':id' => $categoryId]);
    }
    public function getByIds(array $ids)
    {
        $where = implode(',',$ids);
        $sql = "SELECT * FROM {$table} WHERE id IN ({$where})";
        $table = $this->getTableName();
        return $this->getQuery($sql);
    }
}