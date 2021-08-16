<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

echo Html::tag("h2", "Users");

echo GridView::widget([
    "dataProvider" => $dataProvider,
    "columns" => [
        "username",
        "email",
        "created_at:datetime",
        "last_login_at:datetime",
    ],
    "summary" => "",
]);

$this->registerJs("$(() => {
    $('.grid-view tr').on('click', (event) => {
        let id = $(event.currentTarget).attr('data-key');
        window.location.href = '/admin/users/show?id='+id;
    });
})");