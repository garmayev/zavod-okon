<?php

use frontend\modules\shop\models\Client;
use frontend\modules\shop\models\Order;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $model Order
 * @var $client Client
 */

echo Html::beginTag("section", ["style" => "margin-top: 250px;", "class" => ["advantages"]]);
echo Html::beginTag("div", ["class" => "container"]);
$form = ActiveForm::begin();
echo $form->field($client, 'firstname')->textInput();
echo $form->field($client, 'lastname')->textInput();
echo $form->field($client, 'patronymic')->textInput();
echo $form->field($client, 'address')->textInput();
echo $form->field($client, 'phone')->textInput();
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);
ActiveForm::end();
echo Html::endTag("div");
echo Html::endTag("section");