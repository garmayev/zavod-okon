<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

$this->registerCss(".about_inner {top: 0; margin-bottom: 20px;}");

echo Html::beginTag("section", ["style" => "padding-top: 250px;"]);

echo \yii\widgets\ListView::widget([
    "dataProvider" => $dataProvider,
    "itemView" => "_production",
    "summary" => "",
    "itemOptions"=>function ($model, $key, $index, $grid){
        $class = ($index % 2) ? 'advantages' : 'work';
        return [
            'key'=>$key,
            'index'=>$index,
            'class'=>$class
        ];
    },
]);

echo Html::endTag("section");