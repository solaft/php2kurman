<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;

    public function getByCategoryId(int $categoryId)
    {

    }

    public function getTableName(): string
    {
       return "products";
    }


}