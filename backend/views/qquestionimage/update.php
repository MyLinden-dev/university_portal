<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestionImage */

$this->title = 'Редактировать Qquestion Image: ' . $model->id_question_image;
$this->params['breadcrumbs'][] = ['label' => 'Qquestion Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_question_image, 'url' => ['view', 'id' => $model->id_question_image]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="qquestion-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
