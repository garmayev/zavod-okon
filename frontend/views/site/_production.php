<?php

use frontend\models\Category;
use frontend\models\Product;
use yii\web\View;

/**
 * @var Category $model
 * @var View $this
 */

$this->registerCss(".advantages > .title {color: white; text-align: center;} .work > .title {text-align: center;}");

echo \yii\helpers\Html::tag("h2", $model->title, ["class" => ["title", "aos-init", "aos-animate"], "data-aos" => "fade-up"]);
//echo $model->description;

echo \yii\widgets\ListView::widget([
    "itemView" => "_product",
    "dataProvider" => new \yii\data\ActiveDataProvider([
        "query" => Product::find()->where(["category_id" => $model->id])
    ]),
    "summary" => ""
]);