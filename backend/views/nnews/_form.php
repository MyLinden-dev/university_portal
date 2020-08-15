<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
// with composer
use yii\jui\DatePicker;
use \execut\widget\dropdownContent\DropdownContent;

/* @var $this yii\web\View */
/* @var $model common\models\NNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nnews-form">

    <div>
        <?= Html::a('Добавить новую категорию', ['ncategory/create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map($modelNCategory::find()->all(), 'id_category', 'title'))->label('Категория') ?>


    <!-- <?= $form->field($model, 'id_category')->widget(DropdownContent::className(), $widgetParams)->label('Категория'); ?> -->

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_from')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'date_to')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'slider_annotation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_on_slider')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить краткую информацию о новости', ['class' => 'btn btn-success']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>
   
   <!--  --------------- Разделы -------------- -->

    <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me">Содержание новости</button>
    <div id="hide-me" class="collapse">

        <?=
            $this->render('/nsection/index',
            [
                'searchModel' => $searchModelNSection,
                'dataProvider' => $dataProviderNSection,
            ]) 
        
        /* ListView::widget([
            'dataProvider' => $dataProviderNSection,
            'summary' => false,*/
            /*'viewParams'=>[
                'model' => $modelNSection,
                'dataProviderNSectionImage' => $searchModelNSectionImage->search(Yii::$app->request->queryParams+['NSectionImage' => ['==', 'id_section' =>$modelNSection->id_section]]),
                //$dataProviderNSectionImage,
                'dataProviderNSectionLink' => $searchModelNSectionLink->search(Yii::$app->request->queryParams+['NSectionLink' => ['==', 'id_section' =>$modelNSection->id_section]]),
                //$dataProviderNSectionLink,  
            ],*/


        /*    'itemView'=>  function ($model , $key , $index , $widget) {
                return $this->render('/nsection/index',[ 
                'model' => $model,*/

            //'itemView'=> //'/nsection/update' 
            /*'itemView'=>  $this->render('/nsection/update',[ 'id' => '1'
/*                'model' => $modelNSection,
                'dataProviderNSectionImage' => $dataProviderNSectionImage,
                'dataProviderNSectionLink' => $dataProviderNSectionLink,  
  */        
       
  /*
  'itemView'=>  function ($model , $key , $index , $widget) {
                return $this->render('/nsection/update',[ 
                'model' => $model,
                'dataProviderNSectionImage' => $dataProviderNSectionImage,
                'dataProviderNSectionLink' => $dataProviderNSectionLink,  
  */

                //'dataProviderNSectionImage' => Yii::$app->$dataProviderNSectionImage,
                //'dataProviderNSectionLink' => Yii::$app->$dataProviderNSectionLink,

                //return $this->render('/nsection/update',[
               // 'model' => $model,
                //'modelNNews' => $modelNNews,


                //'dataProviderNImage' => $dataProviderNImage,
                //'dataProviderNSectionImage' => $dataProviderNSectionImage,
                //'dataProviderNSectionLink' => $dataProviderSectionLink,    
    //])
                //'_section';
                /*return $this->render('_section',
                    'modelNSection' => $modelNSection,
                );*/
                 //   Html::tag('h2', Html::encode($modelNSection->title)) . 
                 //   Html::tag('p', Html::encode($modelNSection->text))

               // ;
           // }
       // ]) 
        ?>    
        <div>
            <?= Html::a('Добавить новый раздел',['creatensection'], ['class' => 'btn btn-success']) ?>
        </div>
    </div> 


</div>
