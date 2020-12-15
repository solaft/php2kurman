<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";


spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

include VENDOR_DIR . 'autoload.php';

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    /** @var \app\controllers\ProductController $controller */
    $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
    //$controller = new $controllerClass(new \app\services\renderers\TwigRenderer());
    $controller->runAction($actionName);
}