<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NLink */

$this->title = 'Редактировать ссылку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Nlinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_link]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nlink-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
