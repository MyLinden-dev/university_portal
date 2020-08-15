<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NSectionLink */

$this->title = 'Добавить ссылки разделов';
$this->params['breadcrumbs'][] = ['label' => 'Nsection Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nsection-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
