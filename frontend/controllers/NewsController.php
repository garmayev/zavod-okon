<?php


namespace frontend\controllers;


use frontend\models\Article;
use yii\data\ActiveDataProvider;

class NewsController extends \yii\web\Controller
{
    public function actionIndex(): string
    {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Article::find()->orderBy("created_at")
            ])
        ]);
    }

    public function actionView($id): string
    {
        return $this->render("view", [
            "model" => Article::findOne($id)
        ]);
    }
}