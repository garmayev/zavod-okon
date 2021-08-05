<?php

use frontend\models\Product;
use vova07\imperavi\Widget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $model Product
 */

$form = ActiveForm::begin();
echo $form->field($model, "title")->textInput();
echo $form->field($model, "description")->widget(Widget::className(), [
	'settings' => [
		'lang' => 'ru',
		'minHeight' => 200,
		'plugins' => [
			'clips',
			'fullscreen',
		],
	],
]);
echo $form->field($model, "file")->fileInput();
echo $form->field($model, "category_id")->dropDownList(\yii\helpers\ArrayHelper::map(\frontend\models\Category::find()->all(), "id", "title"));
echo Html::submitInput("Save", ["class" => ["btn", "btn-primary"]]);
echo Html::a("Cancel", Yii::$app->request->referrer, ["class" => ["btn", "btn-danger"]]);
ActiveForm::end();