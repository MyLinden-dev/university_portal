<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestionImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qquestion-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_question')->textInput() ?>

    <?= $form->field($model, 'id_image')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
