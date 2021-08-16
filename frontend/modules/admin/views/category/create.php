<?php

use frontend\models\Category;
use vova07\imperavi\Widget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $model Category
 */

$form = ActiveForm::begin();
echo $form->field($model, "title")->textInput();
echo $form->field($model, "description")->widget(Widget::className(), [
	'settings' => [
		'lang' => 'ru',
		'minHeight' => 200,
	],
]);
echo $form->field($model, "file")->fileInput();
echo Html::submitInput("Save", ["class" => ["btn", "btn-success"], "style" => "margin-right: 10px;"]);
echo Html::a("Cancel", Yii::$app->request->referrer, ["class" => ["btn", "btn-danger"]]);
ActiveForm::end();