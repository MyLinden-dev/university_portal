<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\QQuestionImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изображения вопросов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qquestion-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_question_image',
            'question_title',
            //'image_path_image',
            [
                'class' => '\dosamigos\grid\columns\ImageColumn',
                'attribute' => 'image_path_image',
                'imgOptions' => [
                    'class' => 'img-responsive img-circle',
                    'width' => '128'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'rowSpanNoFilterHeaders' => true,
                'headerOptions' => [
                    'style' => 'text-align: center !important;vertical-align: middle !important'
                ]
            ],

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view} {delete}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
