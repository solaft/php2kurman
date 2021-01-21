<?php


namespace app\base;


class Request
{
    protected $requestString = '';
    protected $controllerName = null;
    protected $actionName = null;
    protected $isPost = false;
    protected $isGet = true;
    protected $isAjax = false;
    protected $method;

    //controller/action&id=1

    protected $urlPattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<get>.*)#ui";

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        if(preg_match_all($this->urlPattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }
    }

    public function get(string $name)
    {
        return $_GET[$name];
    }

    public function post(string $name)
    {
        return $_POST[$name];
    }

    public function param(string $name)
    {
        return $_REQUEST[$name];
    }

    /**
     * @return null
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return null
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    public function isPost()
    {
        return  $this->method == "POST";
    }

    public function isGet()
    {
        return $this->method == "GET";
    }

}