<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NNews */

$this->title = 'Редактировать новость: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_news]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="nnews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelNCategory' => $modelNCategory,
        'searchModelNSectionImage' => $searchModelNSectionImage,
        'searchModelNSectionLink' => $searchModelNSectionLink,
        'dataProviderNSectionImage' => $dataProviderNSectionImage,
        'dataProviderNSectionLink' => $dataProviderNSectionLink,
        'searchModelNCategory' => $searchModelNCategory,
        'dataProviderCategory' => $dataProviderCategory,
        'widgetParams' => $widgetParams,
        'modelNSection' => $modelNSection,
        'dataProviderNSection' => $dataProviderNSection,
        //'dataProviderSectionLink' => $
        //'dataProviderNImage' => $dataProviderNImage,
    ]) ?>

</div>
