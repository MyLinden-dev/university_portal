<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \execut\widget\dropdownContent\DropdownContent;

/* @var $this yii\web\View */
/* @var $model common\models\CEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-form">

    <?php $form = ActiveForm::begin(); ?>

<!--<?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map($modelNCategory::find()->all(), 'id_category', 'title'))->label('Категория') ?> -->
    <?= $form->field($model, 'id_news')->widget(DropdownContent::className(), $widgetParams)->label('Новость'); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

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
