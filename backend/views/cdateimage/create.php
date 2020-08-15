<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CDateImage */

$this->title = 'Create Cdate Image';
$this->params['breadcrumbs'][] = ['label' => 'Cdate Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cdate-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
