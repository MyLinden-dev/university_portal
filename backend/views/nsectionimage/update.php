<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionImage */

$this->title = 'Редактировать изображения разделов: ' . $model->id_section_image;
$this->params['breadcrumbs'][] = ['label' => 'Изображения разделов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_section_image, 'url' => ['view', 'id' => $model->id_section_image]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nsection-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderNImage' => $dataProviderNImage,
    ]) ?>

</div>
