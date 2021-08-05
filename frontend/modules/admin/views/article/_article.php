<?php

use frontend\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var Article $model
 */

echo Html::a(Html::tag("h3", $model->title), Url::to(["/admin/article/update", "id" => $model->id]));
echo Html::tag("div", $model->summary);
