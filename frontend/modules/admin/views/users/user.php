<?php

use dektrium\user\models\User;
use yii\bootstrap\Collapse;
use yii\web\View;

/**
 * @var User $model
 * @var View $this
 */

echo Collapse::widget([
    'items' => [
        [
            'label' => 'User info',
            'content' => $this->render("_info", [
                'model' => $model
            ]),
            'contentOptions' => ['class' => 'in']
        ], [
            'label' => 'Profile',
            'content' => $this->render('_profile', [
                'model' => $model
            ])
        ], [
            'label' => 'State',
            'content' => $this->render('_state', [
                'model' => $model
            ])
        ]
    ]
]);

$this->registerCss(".input-group {margin: 5px 0; width: 100%;} .input-group > .form-control {width: 100%;}");
$this->registerJs("$(() => {
    $('[name=role]').on('change', (event) => {
        console.log($(event.currentTarget).val());
        $.ajax({
            url: '/admin/users/state',
            data: {user_id: $(event.currentTarget).attr('user_id'), name: $(event.currentTarget).val()}
        }).done((response) => {
            console.log(response);
        });
    })
})");