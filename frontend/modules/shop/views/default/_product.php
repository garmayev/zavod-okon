<?php

use frontend\modules\shop\models\Product;
use yii\helpers\Html;

/**
 * @var Product $model
 */

?>
<div class="advantages_top">
    <p class="advantages_title"><?= $model->title ?></p>
    <div class="advantages_img">
        <?= Html::img($model->thumb, ["style" => "height: 85px; width: 85px;"]) ?>
    </div>
</div>
<div class="advantages_text" style="margin-bottom: 20px;">
    <?= $model->description ?>
</div>
<a class="btn btn-buy">
    <?= Yii::t("app", "Buy") ?>
</a>