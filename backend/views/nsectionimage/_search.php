<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionImageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nsection-image-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_section_image') ?>

    <?= $form->field($model, 'id_section') ?>

    <?= $form->field($model, 'id_image') ?>

    <?= $form->field($model, 'is_on_slider')->checkbox() ?>

    <?= $form->field($model, 'is_main')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
