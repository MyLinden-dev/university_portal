<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NHeaderLink */

$this->title = 'Редактировать Nheader Link: ' . $model->id_header_link;
$this->params['breadcrumbs'][] = ['label' => 'Nheader Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_header_link, 'url' => ['view', 'id' => $model->id_header_link]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nheader-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
