<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nsection-link-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_section')->textInput() ?>

    <?= $form->field($model, 'id_link')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


 <!--  --------------- Ссылки -------------- -->

    <?= ListView::widget([
            'dataProvider' => $dataProviderNLink,
            'summary' => false,
            'itemView'=> function ($model , $key , $index , $widget) {
                return $this->render('/nlink/update',[
                'model' => $model,
                ]);
            }
    ]) ?>    

</div>
