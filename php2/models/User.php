<?php
namespace app\models;

class User extends Model
{
    public $name;
    public $email;

    public function getByLogin($login) {

    }

    public function getTableName(): string
    {
        return "users";
    }
}
