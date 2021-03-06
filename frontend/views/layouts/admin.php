<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AdminAsset;
use yii\helpers\Html;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $this->registerCsrfMetaTags();
    ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('_header'); ?>
    <?= $content ?>
    <?= $this->render("_footer") ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
