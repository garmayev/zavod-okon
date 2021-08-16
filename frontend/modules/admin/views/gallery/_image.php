<?php

/**
 * @var Image $model
 */

use frontend\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a(
    Html::img($model->thumbs, ["alt" => $model->title, "width" => "100%"]),
    Url::to(["/admin/gallery/view", "id" => $model->id]),
);
