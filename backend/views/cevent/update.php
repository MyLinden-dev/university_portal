<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CEvent */

$this->title = 'Редактировать событие: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_event]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="cevent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
