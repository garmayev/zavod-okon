<?php

use frontend\modules\shop\models\Product;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $model Product
 */

$form = ActiveForm::begin();
echo $form->field($model, "title")->textInput();
echo $form->field($model, "description")->textarea();
echo $form->field($model, "price")->textInput();
echo $form->field($model, "file")->fileInput();
echo Html::submitInput("Save", ["class" => ["btn", "btn-primary"]]);
echo Html::a("Cancel", Yii::$app->request->referrer, ["class" => ["btn", "btn-danger"]]);
ActiveForm::end();