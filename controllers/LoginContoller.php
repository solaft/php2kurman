<?php


namespace app\controllers;


class LoginController extends Controller
{
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = post('login');
    $password = getHash(post('password'));

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
?>

<form action="" method="post">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="Войти">
</form>