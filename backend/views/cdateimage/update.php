<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CDateImage */

$this->title = 'Редактировать Cdate Image: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cdate Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_date_image]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="cdate-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
