<?php
/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

$this->registerCss(".about_inner {top: 0; margin-bottom: 20px;}");

echo Html::beginTag("section", ["style" => "padding-top: 250px;"]);
echo Html::endTag("section");