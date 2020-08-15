<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestionImage */

$this->title = 'Create Qquestion Image';
$this->params['breadcrumbs'][] = ['label' => 'Qquestion Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qquestion-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
