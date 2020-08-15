<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_event',
            //'id_news',
            'title',
            [
                'attribute'=>'nnews_title',
                'value' => function($data) {
                    return $data->nNews->title;
                },
            ],
            [
                'attribute' => 'text',
                'value' => function ($data) {
                    return StringHelper::truncate($data->text, 20);
                }
            ],
            //'date_from',
            //'date_to',
            [
                'class' => '\dosamigos\grid\columns\BooleanColumn',
                'attribute' => 'actual',
                'treatEmptyAsFalse' => true,
                'filter' => '',
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
