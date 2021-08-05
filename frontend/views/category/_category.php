<?php

use frontend\models\Category;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Category $model
 * @var View $this
 */

//echo Html::img($model->thumbs, ["style" => "height: 200px"]);
//echo Html::a($model->title, ["category/view", "id" => $model->id], ["class" => ["submit"]]);
?>
<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $model->id]) ?>">
	<img src="<?= $model->thumbs ?>" width="300" height="240">
	<h4><?= $model->title ?></h4>
</a>
