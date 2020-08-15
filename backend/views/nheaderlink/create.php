<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NHeaderLink */

$this->title = 'Create Nheader Link';
$this->params['breadcrumbs'][] = ['label' => 'Nheader Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nheader-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
