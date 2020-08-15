<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\NNews */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nnews-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_news], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_news], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_news',
            //'id_category',
            'nCategory.title',
            //'ncategory_title',
            'title',
            'date_add',
            'date_from',
            'date_to',
            'slider_annotation',
            'is_on_slider:boolean',
        ],
    ]) ?>

    <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me">Текст новости</button>
    <div id="hide-me" class="collapse in">        
        <?=         
        ListView::widget([
            'dataProvider' => $dataProviderSection,
            'summary' => false,
            'itemView'=> function ($model , $key , $index , $widget) {
                return 
                    Html::tag('h2', Html::encode($model->title)) . 
                    Html::tag('p', Html::encode($model->text)) .
                    
                    Html::a('Подробнее о разделе', ['/nsection/view', 'id' => $model->id_section], ['class' => 'btn btn-primary'])

                ;
            }
        ]) 
        ?>
            
    </div>
    

</div>
