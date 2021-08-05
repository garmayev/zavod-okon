<?php
/**
 * @var Image $model
 */

use frontend\models\Image;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($model, "title")->textInput(["placeholder" => "Title of Image"])->label(false);
echo $form->field($model, "description")->textarea(["placeholder" => "Description of Image"])->label(false);
echo $form->field($model, "favourite")->checkbox();
echo $form->field($model, 'file')->fileInput()->label(false);
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);

ActiveForm::end();