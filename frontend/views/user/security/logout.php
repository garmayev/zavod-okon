<?php
/**
 * @var View $this
 */

use yii\web\View;

Yii::$app->request->redirect(Yii::$app->user->returnUrl);