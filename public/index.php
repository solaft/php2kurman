  
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";


spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$products = (new \app\models\Product())->getAll();


var_dump($products);