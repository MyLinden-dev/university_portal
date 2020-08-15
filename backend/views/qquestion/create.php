<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestion */

$this->title = 'Добавить вопрос';
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qquestion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
