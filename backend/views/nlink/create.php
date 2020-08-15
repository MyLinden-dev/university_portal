<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NLink */

$this->title = 'Добавить ссылку';
$this->params['breadcrumbs'][] = ['label' => 'Nlinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nlink-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
