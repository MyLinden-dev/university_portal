<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\NStatistic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nstatistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_from')->widget(\yii\jui\DatePicker::class, [
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>

    <?= $form->field($model, 'date_to')->widget(\yii\jui\DatePicker::class, [
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
