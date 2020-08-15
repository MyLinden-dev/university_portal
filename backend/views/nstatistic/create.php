<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NStatistic */

$this->title = 'Create Nstatistic';
$this->params['breadcrumbs'][] = ['label' => 'Nstatistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nstatistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
