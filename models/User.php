<?php
namespace app\models;

class User extends Record
{
    public $name;
    public $email;
    public $password;

    public function getByLogin($login) {
        /*if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $password = hash($_POST['password']);
        */
            $sql = "SELECT * FROM users 
                    WHERE login = '{$login}' 
                    AND password = '{$password}'"; 
        
            if($user = queryOne($sql)) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                redirect('/');
            } else {
                echo "Не авторизованы!";
            }
        }
    }

    public static function getTableName(): string
    {
        return "users";
    }
}