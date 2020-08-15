<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\NSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nsection-form">

    <div>
        <?= Html::a('Добавить новую новость', ['nnews/create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_hidden')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить этот раздел', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<h2>Картинки</h2>
   <!--  --------------- Картинки -------------- -->
    <?= ListView::widget([
            'dataProvider' => $dataProviderNSectionImage,
            'summary' => false,
            'itemView'=> function ($model , $key , $index , $widget) {
                return $this->render('/nsectionimage/view',[
                'model' => $model,
                //'dataProviderNImage' => $dataProviderNImage,
                ]);
            }
    ])  ?>    
<h2>Ссылки</h2>
       <!--  --------------- Ссылки -------------- -->
       <?= ListView::widget([
            'dataProvider' => $dataProviderNSectionLink,
            'summary' => false,
            'itemView'=> function ($model , $key , $index , $widget) {
                return $this->render('/nsectionlink/view',[
                'model' => $model,
                //'dataProviderNImage' => $dataProviderNImage,
                ]);
            }
    ])  ?>    
</div>
