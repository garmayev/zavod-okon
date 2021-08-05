<?php

use frontend\modules\shop\models\Product;
use yii\helpers\Url;

/**
 * @var $model Product
 */
?>

<div class="col-lg-3 col-md-4 col-xs-6">
	<div class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="<?= $model->thumb ?>" alt="<?= $model->title ?>" height="50">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
                <?= $model->title ?>
                <a href="<?= Url::to(["product/update", "id"=>$model->id]) ?>"><small class="glyphicon glyphicon-pencil"></small></a>
                <a href="<?= Url::to(["product/delete", "id"=>$model->id]) ?>"><small class="glyphicon glyphicon-trash"></small></a>
            </h4>
			<?= $model->description ?>
			<p>Цена: <?= $model->price ?> <span class="glyphicon glyphicon-ruble"></span></p>
		</div>
	</div>
</div>