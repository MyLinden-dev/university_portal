<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NCategory */

$this->title = 'Редактировать категорию: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_category]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ncategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
