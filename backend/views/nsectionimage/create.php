<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionImage */

$this->title = 'Добавить изображение разделов';
$this->params['breadcrumbs'][] = ['label' => 'Изображения разделов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nsection-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
