<?php


namespace app\services\renderers;

use app\interfaces\RenderInterface;

class TemplateRenderer implements RenderInterface
{
    public function render($template, $params = []) {
        ob_start();
        $templatePath = $this->app
                ->getConfig()['views_dir'] . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}