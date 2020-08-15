<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CEventDate */

$this->title = 'Редактировать дату события: ' . $model->id_event_date;
$this->params['breadcrumbs'][] = ['label' => 'Добавить дату', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_event_date, 'url' => ['view', 'id' => $model->id_event_date]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="cevent-date-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
