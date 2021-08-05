<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var ActiveDataProvider $dataProvider
 */

echo Html::beginTag("section", ["style" => "margin-top: 250px;"]);
echo Html::beginTag("div", ["class" => "container"]);
echo ListView::widget([
    "dataProvider" => $dataProvider,
    "itemView" => "_order",
    "summary" => "",
]);
echo Html::endTag("div");
echo Html::endTag("section");