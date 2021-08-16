<?php

use frontend\models\Image;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var Image $model
 * @var View $this
 */

$form = ActiveForm::begin();
echo $form->field($model, "title")->textInput()->label(false);
echo $form->field($model, "description")->textarea(["rows" => 6])->label(false);
echo $form->field($model, 'favourite')->checkbox();
echo Html::img($model->image, ["style" => "width: 100%;"]);
echo Html::submitButton("Save", ["class" => ["btn btn-success"]]);
ActiveForm::end();