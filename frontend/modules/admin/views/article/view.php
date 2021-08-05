<?php

use frontend\models\Article;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Article $model
 * @var View $this
 */

echo Html::tag("h3", $model->title);
echo Html::tag("div", $model->summary, ["class" => ["container", "summary"]]);
echo Html::tag("div", $model->content, ["class" => ["container", "content"]]);

$this->registerCss(".summary {margin-bottom: 20px;}");