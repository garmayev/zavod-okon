<?php

use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $dataProvider ActiveDataProvider
 */

echo Html::a(Yii::t("app", "Add category"), ["/admin/category/create"], ["class" => ["btn", "btn-primary"], "style" => "margin: 5px 5px; margin-left: 15px;"]);
echo Html::a(Yii::t("app", "Add production"), ["/admin/production/create"], ["class" => ["btn", "btn-success"], "style" => "margin: 5px 5px;"]);

echo ListView::widget([
	"dataProvider" => $dataProvider,
	"itemView" => "_category",
	"summary" => "",
]);

$this->registerCss("
.box-header a, .product a {
	display: none;
}
.box-header:hover a, .product:hover a {
	display: inline-block;
}
");