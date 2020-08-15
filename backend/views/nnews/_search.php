<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NNewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nnews-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_news') ?>

    <!--<?= $form->field($model, 'id_category') ?>
-->
    <?= $form->field($model, 'category.title') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'date_add') ?>

    <?= $form->field($model, 'date_from') ?>

    <?php // echo $form->field($model, 'date_to') ?>

    <?php // echo $form->field($model, 'slider_annotation') ?>

    <?php // echo $form->field($model, 'is_on_slider')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
