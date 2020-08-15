<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NNews */

$this->title = 'Добавить новость';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nnews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelNCategory' => $modelNCategory,
        'dataProviderNSection' => $dataProviderNSection,
    ]) ?>

</div>
