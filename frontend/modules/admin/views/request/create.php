<?php

use frontend\models\Request;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var Request $model
 * @var View $this
 */

$form = ActiveForm::begin();
echo $form->field($model, "client_name")->textInput(["placeholder" => "Input client Name"])->label(false);
echo $form->field($model, "client_phone")->textInput(["placeholder" => "Input client Name"])->label(false);
echo $form->field($model, "status")->dropDownList($model->getStatuses())->label(false);
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);
ActiveForm::end();