<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NStatistic */

$this->title = 'Редактировать Nstatistic: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статистика', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_statistic]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="nstatistic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
