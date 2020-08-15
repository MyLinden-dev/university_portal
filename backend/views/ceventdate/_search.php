<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CEventDateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-date-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_event_date') ?>

    <?= $form->field($model, 'id_event') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'time_from') ?>

    <?= $form->field($model, 'time_to') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
