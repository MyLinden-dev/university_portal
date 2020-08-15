<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestionImage */

$this->title = $model->question_title;
$this->params['breadcrumbs'][] = ['label' => 'Изображения вопросов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="qquestion-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_question_image], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question_title',
            'image_path_image',
        ],
    ]) ?>

    <h3>
        Изображение
    </h3>
    <img src="$model->image_path_image" class="img-responsive" >      

</div>
