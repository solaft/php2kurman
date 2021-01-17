<?php


namespace app\controllers;


class ErrorController extends Controller
{
    public function actionNotFound()
    {
        $this->useLayout = false;
        echo "Страница не найдена";
        //$this->render('not_found');
    }
}