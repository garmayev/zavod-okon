<?php


namespace frontend\controllers;


use frontend\models\Category;
use frontend\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render("index", [
            "categories" => new ActiveDataProvider([
                "query" => Category::find()
            ])
        ]);
    }

    public function actionView($id) {
        return $this->render("view", [
            "model" => Category::findOne($id),
            "products" => new ActiveDataProvider([
                "query" => Product::find()->where(["category_id" => $id])
            ])
        ]);
    }
}