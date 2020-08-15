<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nimage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_background')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'path_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'path_background')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'db_image')->textInput() ?>

    <?= $form->field($model, 'db_background')->textInput() ?>

    <?= $form->field($model, 'image_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'background_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
