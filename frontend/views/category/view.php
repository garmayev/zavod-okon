<?php

use frontend\models\Category;
use frontend\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Category $model
 * @var View $this
 * @var ActiveDataProvider $products
 */
$this->registerCss(".about_inner {top: 0; margin-bottom: 20px;}");

$product_query = Product::find()->where(["category_id" => $model->id]);

echo Html::beginTag("section", ["style" => "padding-top: 250px;"]);

echo \yii\helpers\Html::tag("h2", $model->title, ["class" => ["title", "aos-init", "aos-animate"], "data-aos" => "fade-up"]);

if (count($product_query->all())) {
    $this->registerCss(".title {text-align: center;}");

    echo \yii\widgets\ListView::widget([
        "itemView" => "_product",
        "dataProvider" => $products,
        "summary" => ""
    ]);
}

echo Html::endTag("section");

$this->registerCss(".about_content {
	display: block !important;
}");