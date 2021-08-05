<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var ActiveDataProvider $dataProvider
 */

echo Html::tag("h2", "Articles");

echo Html::a("Create new Article", Url::to(["/admin/article/create"]), ["class" => ["btn", 'btn-success']]);

echo ListView::widget([
    "dataProvider" => $dataProvider,
    "itemView" => "_article",
    "summary" => "",
]);