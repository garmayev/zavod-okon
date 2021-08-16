<?php

use frontend\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var Article $model
 * @var View $this
 */
?>
<p class="title"><a href="<?= Url::to(["news/view", "id" => $model->id]) ?>" style="text-decoration: none; color: #80dffe"><?= $model->title ?></a></p>
<div class="about_text"><?= $model->summary ?></div>
<div class="about_text">
    Дата добавления:
    <?= Yii::$app->formatter->asDate($model->created_at, 'php:d') ?>
    <?= Yii::t("app", Yii::$app->formatter->asDate($model->created_at, 'php:M')) ?>
    <?= Yii::$app->formatter->asDate($model->created_at, 'php:Y') ?>
    <?= Yii::$app->formatter->asTime($model->created_at, 'php:H:i') ?>
</div>
<a href="<?= Url::to(["news/view", "id" => $model->id]) ?>" class="btn"><?= Yii::t("app", "Read more...") ?></a>