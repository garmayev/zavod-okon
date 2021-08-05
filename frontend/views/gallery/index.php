<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

echo Html::beginTag("section", ["style" => "padding-top: 250px;", "class" => "faq"]);
$this->registerCss(".gallery{
    padding-top: 75px;
    background: top/100% 61% url(../img/gallery.jpg) no-repeat;
}");
?>

<div class="gallery" id="gallery">
    <div class="container">
        <h2 class="title" data-aos="fade-down">
            <a href="<?= \yii\helpers\Url::to(["gallery/index"]) ?>" style="text-decoration: none; color: white">Смотрите галерею наших работ</a>
        </h2>
        <div class="gallery_inner">
            <img src="/img/gallery_logo.png" class="gallery_logo" alt="logo">
            <?php
            echo \yii\widgets\ListView::widget([
                "dataProvider" => $dataProvider,
                "itemView" => "_item",
                "summary" => "",
                "options" => [
                    "tag" => "div",
                    "class" => "gallery_slider"
                ],
                "itemOptions" => [
                    "tag" => "div",
                    "class" => "gallery_item"
                ]
            ])
            ?>
        </div>
    </div>
</div>

<?php
echo Html::endTag("section");
?>
