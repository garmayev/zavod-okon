<?php
/**
 * @var Product $model
 */

use frontend\models\Product;
use yii\helpers\Url;

?>
<div class="container">
    <div class="about_inner" style="min-height: 400px">
        <div class="about_item aos-init aos-animate" data-aos="fade-right">
            <h2 class="title aos-init aos-animate" data-aos="fade-down">
                <?= $model->title ?>
            </h2>
            <p class="about_text">
                Подробное описание:
            </p>
            <div class="about_info">
                <?= $model->description ?>
            </div>
        </div>
        <div class="about_item aos-init aos-animate" data-aos="fade-left"<?= (isset($model->image)) ? "style='background-image: url($model->image)'" : "" ?>>
            <img src="/img/logo-2.png" alt="logo" class="about_logo">
        </div>
    </div>
</div>
