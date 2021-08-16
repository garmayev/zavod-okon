<?php


namespace frontend\modules\admin\controllers;


class MainController extends DefaultController
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

}