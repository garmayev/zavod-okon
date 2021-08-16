<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

echo Html::tag("h2", "Gallery");

echo Html::a("Append Image to Gallery", ["/admin/gallery/create"], ["class" => ["btn", "btn-success"]]);

echo ListView::widget([
    "dataProvider" => $dataProvider,
    "itemView" => "_image",
    "summary" => "",
    "options" => [
        "class" => "row",
    ],
    "itemOptions" => [
        "class" => ["col-lg-3", "col-md-4", "col-xs-4"],
    ]
]);

$this->registerCss("div[data-key] {padding: 10px;}");