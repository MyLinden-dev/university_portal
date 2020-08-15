<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nfile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path_file')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type_file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
