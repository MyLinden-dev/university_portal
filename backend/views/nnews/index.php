<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\NCategory;
use common\models\NNews;


/* @var $this yii\web\View */
/* @var $searchModel common\models\NNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nnews-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('К категориям', ['/ncategory/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <div>
        <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me">Инструкция к ведению новостей</button>
        <div id="hide-me" class="collapse">
            <p>
                Даты начала и окончания акутальности влияют на отображение новости в главном списке новостей. 
                
                <br>
                
                ВАЖНО! Если дата окончания не задана, то новость будет отображаться до 31.12.2999.
            </p>
        </div>
    </div>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'ncategory_title',
                'value' => function($data) {
                    return $data->nCategory->title;
                },
                //'filter' => ArrayHelper::map(NCategory::find()->all(), 'id_category', 'title'),
            ],
            'title',
            //'date_add',
            //'date_from',
            //'date_to',
            [
                'class' => '\dosamigos\grid\columns\BooleanColumn',
                'attribute' => 'actual',
                'treatEmptyAsFalse' => true,
                //'filter' => false,
                //'filter' => '<input type="text" class="form-control" name="dis" disabled>',
                'filter' => '',
            ],
            //'slider_annotation',
            [
                'class' => '\dosamigos\grid\columns\BooleanColumn',
                'attribute' => 'is_on_slider',
                'treatEmptyAsFalse' => true,
                'filter' => '',
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
