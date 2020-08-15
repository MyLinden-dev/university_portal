<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
//with composer 
use leandrogehlen\treegrid\TreeGrid;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="tree-index">
	
		<p>
            <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
	
        <p>
            <?php
            if ($dataProvider->count == 0)
                echo Html::a('Создать корневой элемент', ['add'], ['class' => 'btn btn-success']);
            ?>
        </p>
        <?=
        TreeGrid::widget([
            'dataProvider' => $dataProvider,
            'keyColumnName' => 'id_category',
            'parentColumnName' => 'id_parent_category',
            //'showOnEmpty' => FALSE,
           /* 'pluginOptions' => [
                'initialState' => 'collapsed',
            ],*/
            'columns' => [
                'title',
                //'id_category',
                'description',
                //'color',
                [
                    'attribute' => 'сolor',
                    'value' => function($data) {
                        //return $data->color;
                        return '';
                    },
                    'label' => 'Цвет',
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' 
                            . (!empty($model->color) ? $model->color : 'white' 
                            . ' color: white')
                        ];
                    },
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {add}',
                    // Прописывается ОБЯЗАТЕЛЬНО вручную, так как при задании методов по умолчанию передается ошибочный индекс категории. Это связано с использованием TreeGrid.
                    'buttons' => [
                        'view' => function ($url, $model, $key)
                        {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(["ncategory/view",'id'=>$model['id_category']]));
                        },
                        'update' => function ($url, $model, $key)
                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(["ncategory/update",'id'=>$model['id_category']]));
                        },
                        'delete' => function ($url, $model, $key)
                        {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(["ncategory/delete",'id'=>$model['id_category']]));
                        },
                        'add' => function ($url, $model, $key)
                        {
                            //return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url);
                            return Html::a('<span class="glyphicon glyphicon-plus"></span>', Url::to(["ncategory/add",'id'=>$model['id_category']]));
                        },
                    ]
                ]
            ]
        ]);
        ?>
</div>
