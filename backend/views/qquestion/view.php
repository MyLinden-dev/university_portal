<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\QQuestion */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="qquestion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_question], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удлаить этот вопрос?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_question',
            'title',
            'text:ntext',
            'author',
            'email:email',
            'phone',
        ],
    ]) ?>

    <h3>
        Изображения
    </h3>
    <?= ListView::widget([
        'dataProvider' => $dataProviderQuestionImage,
        'summary' => false,
        'itemView'=> function ($model , $key , $index , $widget) {
            return 
            '<p>' .
                Html::img(Html::encode($model->image_path_image), ['class' => 'pull-left img-responsive']) .
            '</p>'
            ;
        }
    ]) ?>
        
</div>
