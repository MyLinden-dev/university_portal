<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestion */

$this->title = 'Редактировать Qquestion: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Qquestions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_question]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="qquestion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
