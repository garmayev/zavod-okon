<?php
/**
 * @var User $model
 */

use dektrium\user\models\User;

$models = Yii::$app->db->createCommand("SELECT `name`, `description` FROM `auth_item`")->queryAll();
$items = \yii\helpers\ArrayHelper::map($models, 'name', 'description');
foreach ( Yii::$app->authManager->getRolesByUser($model->id) as $name => $role ) {
    $activeRole = $role->name;
}
echo field(\yii\helpers\Html::dropDownList('role', 'test', $items, ["class" => 'form-control', 'user_id' => $model->id,  "options" => ["$activeRole" => ["selected" => true]]]));
//var_dump($items);