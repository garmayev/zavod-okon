<?php


namespace frontend\modules\admin\controllers;


use frontend\models\Request;
use yii\data\ActiveDataProvider;

class RequestController extends DefaultController
{
    public function actionIndex() {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Request::find(),
                "pagination" => [
                    "pageSize" => 20
                ]
            ])
        ]);
    }

    public function actionCreate() {
        $model = new Request();
        if ( \Yii::$app->request->isPost ) {
            if ( $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect(["/admin/request/index"]);
            }
        }
        return $this->render("create", [
            "model" => $model
        ]);
    }

    public function actionView($id) {
        return $this->render("view", [
            "model" => Request::findOne($id)
        ]);
    }

    public function actionUpdate($id) {
        $model = Request::findOne($id);
        if ( \Yii::$app->request->isPost ) {
            if ( $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect(["/admin/request/index"]);
            }
        }
        return $this->render("update", [
            "model" => $model
        ]);
    }
}