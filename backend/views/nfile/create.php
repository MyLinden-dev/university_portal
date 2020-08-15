<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NFile */

$this->title = 'Create Nfile';
$this->params['breadcrumbs'][] = ['label' => 'Nfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nfile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
