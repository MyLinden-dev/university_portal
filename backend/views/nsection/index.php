<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Разделы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nsection-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить раздел', ['/nsection/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_section',
            'id_news',
            [
                'attribute' => 'title',
                'value' => function ($data) {
                    return StringHelper::truncate($data->title, 50);
                }
            ],
            [
                'attribute' => 'text',
                'value' => function ($data) {
                    return StringHelper::truncate($data->text, 30);
                }
            ],
            //'is_hidden:boolean',
            [
                'class' => '\dosamigos\grid\columns\BooleanColumn',
                'attribute' => 'is_hidden',
                'treatEmptyAsFalse' => true,
                'filter' => '',
            ],


            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                // Прописывается ОБЯЗАТЕЛЬНО вручную, так как при задании методов по умолчанию передается ошибочный индекс категории. Это связано с использованием TreeGrid.
                'buttons' => [
                    'view' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(["nsection/view",'id'=>$model['id_section']]));
                    },
                    'update' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(["nsection/update",'id'=>$model['id_section']]));
                    },
                    'delete' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(["nsection/delete",'id'=>$model['id_section']]));
                    }
                ]
            ]

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
