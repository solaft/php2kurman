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

    public function getByIds(array $ids)
    {
        $table = $this->getTableName();
        $where = implode(', ', $ids);
        $sql = "SELECT * FROM {$table} WHERE id IN ({$where})";
        return $this->getQuery($sql);
    }

    public function getByCategoryId(int $categoryId)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE category_id = :id";
        return $this->getQuery($sql, [':id' => $categoryId]);
    }
}