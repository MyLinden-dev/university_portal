<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nlink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_image')->textInput() ?>

    <?= $form->field($model, 'id_file')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_useful')->checkbox() ?>

    <?= $form->field($model, 'beauty_title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
