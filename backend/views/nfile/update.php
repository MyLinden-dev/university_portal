<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NFile */

$this->title = 'Редактировать Nfile: ' . $model->id_file;
$this->params['breadcrumbs'][] = ['label' => 'Nfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file, 'url' => ['view', 'id' => $model->id_file]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nfile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
