<?php


namespace frontend\modules\admin\controllers;


use frontend\models\Article;
use yii\data\ActiveDataProvider;

class ArticleController extends DefaultController
{
    public function actionIndex() {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Article::find()
            ])
        ]);
    }

    public function actionView($id) {
        return $this->render("view", [
            "model" => Article::findOne($id)
        ]);
    }

    public function actionCreate() {
        $model = new Article();
        if ( \Yii::$app->request->isPost ) {
            if ( $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect(["/admin/article/index"]);
            }
        }
        return $this->render("create", [
            "model" => $model
        ]);
    }

    public function actionUpdate($id) {
        $model = Article::findOne($id);
        if ( \Yii::$app->request->isPost ) {
            if ( $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect(["article/view", "id" => $id]);
            }
        }
        return $this->render("create", [
            "model" => $model
        ]);
    }
}