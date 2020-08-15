<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSection */

$this->title = 'Обновить раздел: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Разделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_section]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nsection-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'modelNNews' => $modelNNews,
        //'modelNSectionImage' => $modelNSectionImage,
        'dataProviderNSectionImage' => $dataProviderNSectionImage,
        'dataProviderNSectionLink' => $dataProviderNSectionLink,
        //'dataProviderNImage' => $dataProviderNImage,
    ]) ?>

</div>
