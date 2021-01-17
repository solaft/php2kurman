  
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";
include VENDOR_DIR . 'autoload.php';

$request = new \app\base\Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    $renderer = new \app\services\renderers\TemplateRenderer();
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass($renderer);
   // try {
        $controller->runAction($actionName);
  /*  } catch (\app\exceptions\NotFoundException $e) {
        (new \app\controllers\ErrorController($renderer))->runAction('notFound');
    } catch (Exception $e) {
       // header("Location: /");
    }*/
}