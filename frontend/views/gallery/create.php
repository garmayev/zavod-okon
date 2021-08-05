<?php

use frontend\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 *
 * @var Image $model
 */

$this->registerCss(".about_inner {top: 0; margin-bottom: 20px;}");

echo Html::beginTag("section", ["style" => "padding-top: 250px;"]);
?>
<form method="post" action="<?= Url::to(["gallery/create"]) ?>" enctype="multipart/form-data">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
    <?= Html::activeInput("file", $model, "file") ?>
    <?= Html::activeInput("text", $model, "title") ?>
    <?= Html::activeInput("textarea", $model, "description") ?>
    <?= Html::submitButton("Send") ?>
</form>

<?php
echo Html::endTag("section");
