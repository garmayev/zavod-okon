<?php

use frontend\models\Request;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var ActiveDataProvider $dataProvider
 */

echo Html::tag("h2", "Requests");

echo Html::a(Yii::t("app", "Create Request"), Url::to(["/admin/request/create"]), ["class" => ["btn", "btn-success"]]);

echo GridView::widget([
    "dataProvider" => $dataProvider,
    "summary" => "",
    "tableOptions" => [
        "class" => ["table", "table-striped", "table-hover"]
    ],
    "columns" => [
        "id",
        "client_name",
        "client_phone",
        [
            "attribute" => "status",
            "format" => "raw",
            "value" => function ( Request $model) {
                return $model->getStatus();
            }
        ], [
            "attribute" => "created_at",
            "format" => "datetime",
            "value" => function ( Request $model ) {
                return $model->created_at;
            }
        ], [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {link}',
        ],
    ]
]);