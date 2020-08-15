<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CEventDate */

$this->title = 'Добавление даты события';
$this->params['breadcrumbs'][] = ['label' => 'Даты событий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
