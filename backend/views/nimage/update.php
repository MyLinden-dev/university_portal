<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NImage */

$this->title = 'Редактировать изображения: ' . $model->id_image;
$this->params['breadcrumbs'][] = ['label' => 'Nimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_image, 'url' => ['view', 'id' => $model->id_image]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nimage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
