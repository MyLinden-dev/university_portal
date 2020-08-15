<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionLink */

$this->title = 'Редактировать ссылки разделов: ' . $model->id_section_link;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки разделов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_section_link, 'url' => ['view', 'id' => $model->id_section_link]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nsection-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderNLink' => $dataProviderNLink,
    ]) ?>

</div>
