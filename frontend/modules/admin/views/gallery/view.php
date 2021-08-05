<?php

use frontend\models\Image;
use yii\helpers\Html;

/**
 * @var Image $model
 */

echo Html::tag(
    "h3",
    $model->title.
        Html::a("", ["/admin/gallery/update", "id" => $model->id], ["class" => ["glyphicon", "glyphicon-pencil"]]).
        Html::a("", ["/admin/gallery/delete", "id" => $model->id], ["class" => ["glyphicon", "glyphicon-trash"]])
);
echo Html::tag("div", $model->description);
echo Html::img($model->image, ["style" => "width: 50%"]);