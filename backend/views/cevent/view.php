<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CEvent */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cevent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['Редактировать', 'id' => $model->id_event], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['Удалить', 'id' => $model->id_event], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это событие?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_event',
            //'id_news',
            'title',
            [
                'attribute'=>'nnews_title',
                'value' => function($data) {
                    return $data->nNews->title;
                },
            ],
            'text:ntext',
            'date_from',
            'date_to',

        ],
    ]) ?>

</div>
