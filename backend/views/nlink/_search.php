<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NLinkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nlink-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_link') ?>

    <?= $form->field($model, 'id_image') ?>

    <?= $form->field($model, 'id_file') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'page_url') ?>

    <?php // echo $form->field($model, 'is_useful')->checkbox() ?>

    <?php // echo $form->field($model, 'beauty_title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
