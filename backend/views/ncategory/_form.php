<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//with composer
use kartik\color\ColorInput;
/* @var $this yii\web\View */
/* @var $model common\models\NCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ncategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_parent_category')
        ->dropDownList(ArrayHelper::map($model::find()->all(), 'id_category', 'title'), array('prompt'=>''))
        ->label('Родительская категория') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
        // Проблемы с отображением этого поля? Установи useNative в false. 
        // useNative пытается задействовать HTML5, который поддерживается не всеми браузерами.  
        'useNative' => true,
        'readonly' => true,
        'options' => ['placeholder' => 'Выберите цвет', 'class'=>'text-center'], 
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить категорию', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
