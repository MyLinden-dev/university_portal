<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionImage */

$this->title = 'Изображение №' . $model->id_section_image;
$this->params['breadcrumbs'][] = ['label' => 'Изображения разделов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nsection-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['/nsectionimage/update', 'id' => $model->id_section_image], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['/nsectionimage/delete', 'id' => $model->id_section_image], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_section_image',
            //'id_section',
            'id_image',
            'is_on_slider:boolean',
            'is_main:boolean',
        ],
    ]) ?>

</div>
