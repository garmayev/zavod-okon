<?php

use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;
use yii\helpers\Html;
/**
 * @var $dataProvider ActiveDataProvider
 * @var $this View
 */

echo Html::a("Add Product", ["/admin/product/create"], ["class" => ["btn", "btn-primary"], "style" => "margin: 10px 5px;"]);

echo ListView::widget([
	"dataProvider" => $dataProvider,
	"itemView" => "_product",
	"summary" => "",
]);

$this->registerCss("
.media-heading .glyphicon {
	display: none;
}
.media-heading:hover .glyphicon {
	display: inline-block;
}
");