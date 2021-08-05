<?php

use frontend\models\Request;
use yii\web\View;
use yii\helpers\Html;
/**
 * @var Request $model
 * @var View $this
 */
?>

<table class="table table-striped">
    <tbody>
        <tr>
            <td><?= $model->getAttributeLabel("client_name") ?></td>
            <td><?= $model->client_name ?></td>
        </tr>
        <tr>
            <td><?= $model->getAttributeLabel("client_phone") ?></td>
            <td><?= $model->client_phone ?></td>
        </tr>
        <tr>
            <td><?= $model->getAttributeLabel("status") ?></td>
            <td><?= $model->getStatus() ?></td>
        </tr>
        <?php
            if ( $model->address !== null ) {
        ?>
        <tr>
            <td><?= $model->getAttributeLabel("client_name") ?></td>
            <td><?= $model->client_name ?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
