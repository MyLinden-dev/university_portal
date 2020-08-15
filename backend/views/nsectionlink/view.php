<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionLink */

$this->title = 'Ссылка №' . $model->id_link;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки разделов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nsection-link-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['/nsectionlink/update', 'id' => $model->id_section_link], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['/nsectionlink/delete', 'id' => $model->id_section_link], [
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
            //'id_section_link',
            //'id_section',
            'id_link',
        ],
    ]) ?>

</div>
