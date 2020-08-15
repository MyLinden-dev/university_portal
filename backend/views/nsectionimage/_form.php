<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nsection-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_section')->textInput() ?>

    <?= $form->field($model, 'id_image')->textInput() ?>

    <?= $form->field($model, 'is_on_slider')->checkbox() ?>

    <?= $form->field($model, 'is_main')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

 <!--  --------------- Картинки -------------- -->

    <?= ListView::widget([
            'dataProvider' => $dataProviderNImage,
            'summary' => false,
            'itemView'=> function ($model , $key , $index , $widget) {
                return $this->render('/nimage/update',[
                'model' => $model,
                ]);
            }
    ]) ?>    

</div>
