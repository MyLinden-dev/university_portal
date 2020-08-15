<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
//with composer
use kartik\color\ColorInput;
/* @var $this yii\web\View */
/* @var $model common\models\NCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ncategory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_category], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_category], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_category',
            'parent.title' => [
                'attribute' => 'id_parent_category',
                'value' => function($data) {
                    return $data->parent->title;
                },
                'label' => 'Родительская категория',
            ], 
            //'id_parent_category',
            'title',
            'description:ntext',
            //'color',
            /*,
            [
                'attribute' => 'сolor',
                'value' => 
                'label' => 'Цвет',
                'options' => function ($model, $key, $index, $column) {
                    return ['style' => 'background-color:' 
                        . (!empty($model->color) ? $model->color : 'white')
                    ];
                },
            ],*/
        ],
    ]) ?>

    <?= ColorInput::widget([
            'name' => 'color',
            'value' => $model->color, //'#31af56',
            'useNative'=> true,
            'disabled' => true,
        ]);
    ?>

    <h3>
        Новости этой категории
    </h3>

    <?= ListView::widget([
        'dataProvider' => $dataProviderNNews,
        //'summary' => false,
        'itemView'=> function ($model , $key , $index , $widget) {
                return 
                    Html::a(Html::encode($model->title), ['/nnews/view', 'id' => $key]);
                ;
            }
    ]) ?>    



</div>
