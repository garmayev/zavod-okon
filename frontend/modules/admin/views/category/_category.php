<?php

use frontend\models\Category;
use frontend\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $model Category
 */

$products = Product::find()->where(["category_id" => $model->id])->all();

?>
<div class="col-lg-4 col-md-6 col-xs-12">
	<div class="box box-default col-lg-4 col-md-4 col-xs-12">
		<div class="box-header with-border">
			<h3 class="box-title">
                <?= $model->title ?>
                <a href="<?= Url::to(['/admin/category/update', 'id' => $model->id]) ?>"><small><span class="glyphicon glyphicon-pencil"></span></small></a>
                <a href="<?= Url::to(['/admin/category/delete', 'id' => $model->id]) ?>"><small><span class="glyphicon glyphicon-trash"></span></small></a>
            </h3>
			<div class="box-tools pull-right">
				<span class="label label-default"><?= count($products) ?></span>
			</div>
		</div>
		<div class="box-body">
			<?php
				foreach ($products as $product) {
				    $update = "<a href='/admin/production/update?id={$product->id}'><small class='glyphicon glyphicon-pencil'></small></a>";
				    $delete = "<a href='/admin/production/delete?id={$product->id}'><small class='glyphicon glyphicon-trash'></small></a>";
					echo "<p class='product'>$product->title {$update} {$delete}</p>";
				}
			?>
		</div>
	</div>
</div>