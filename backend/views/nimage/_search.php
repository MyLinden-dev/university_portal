<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NImageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nimage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_image') ?>

    <?= $form->field($model, 'path_image') ?>

    <?= $form->field($model, 'path_background') ?>

    <?= $form->field($model, 'title_image') ?>

    <?= $form->field($model, 'title_background') ?>

    <?= $form->field($model, 'db_image') ?>

    <?= $form->field($model, 'db_background') ?>

    <?php // echo $form->field($model, 'image_type') ?>

    <?php // echo $form->field($model, 'background_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
