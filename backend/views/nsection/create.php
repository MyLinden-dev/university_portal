<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSection */

$this->title = 'Добавить раздел';
$this->params['breadcrumbs'][] = ['label' => 'Разделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nsection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelNNews' => $modelNNews,
    ]) ?>

</div>
