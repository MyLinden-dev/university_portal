<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $modelSection common\modelSections\NSection */

$this->title = $modelSection->title;
if ($isIn === false)
{
    $this->params['breadcrumbs'][] = ['label' => 'Разделы', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);
?>

<div class="nsection-view">

    <p>
        <?= Html::a('Редактировать', ['nsection/update', 'id' => $modelSection->id_section], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['nsection/delete', 'id' => $modelSection->id_section], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот раздел?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $modelSection,
        'attributes' => [
            //'id_section',
            //'id_news',
            'title',
            'text:ntext',
            'is_hidden:boolean',
        ],
    ]) ?>

    <p>--------------Изображения--------------</p>
    // Здесь возвращать view sectionimage
    <?= ListView::widget([
            'dataProvider' => $dataProviderSectionImages,
            'summary' => false,
            'itemView'=> function ($modelSection , $key , $index , $widget) {
                return 
                Html::tag('div', 
                    Html::img(Html::encode($modelSection->image->pathForShowImage)) .                
                    Html::tag('p', 
                        'Отображается на слайдере: ' . 
                        Html::encode(($modelSection->is_on_slider == 0) ? "Да" : "Нет")
                    ) . 
                    Html::tag('p', 
                        'Является главным изображением новости: ' . 
                        Html::encode(($modelSection->is_main == 0) ? "Да" : "Нет")
                    ) .
                    Html::tag('p', 
                        'Имя изображения: ' . 
                        Html::encode($modelSection->image->titleImageWithType)
                    ) .
                    Html::tag('p', 
                        'Путь к изображению: ' . 
                        Html::encode($modelSection->image->absolutePathImage)
                    )
                )
                ;
        }
    ]) ?>    

    <p>--------------Ссылки--------------</p>
    <?= ListView::widget([
            'dataProvider' => $dataProviderSectionLinks,
            'summary' => false,
            'itemView'=> function ($modelSection , $key , $index , $widget) {
                return 
                Html::tag('div', 
                    Html::tag('p', 'Имя ссылки: ' . Html::encode($modelSection->link->title)) .
                    Html::tag('p', 'Краткое имя: ' . Html::encode($modelSection->link->beauty_title)) .

                    Html::tag('p', 'Адрес ссылки: ' .
                        Html::encode($modelSection->link->page_url)) .

                    /*Html::tag('p', 'Ссылка: ' .
                        Html::a(Html::encode($modelSection->link->title), Html::encode($modelSection->link->page_url))) .
                    */
                    Html::tag('p', 'Это полезная ссылка: ' . 
                        Html::encode(($modelSection->link->is_useful == 0) ? "Да" : "Нет")) .

                    Html::tag('p', 'Файл: ' . Html::encode($modelSection->link->file->titleFileWithType)) .

                    Html::tag('p', 'Файл ссылки: ' . Html::encode($modelSection->link->file->absolutePathFile)) .

                    Html::tag('p', 'Изображение: ') .
                    Html::img(Html::encode($modelSection->link->image->pathForShowImage)) .                
                    
                    Html::tag('p', 'Изображение, прикрепленное к ссылке: ' . Html::encode($modelSection->link->image->titleImageWithType)) .
                    Html::tag('p', 
                        'Путь к изображению: ' . 
                        Html::encode($modelSection->link->image->absolutePathImage)
                    ) .
                    Html::tag('p', '--------------------------')
                )
                ;
        }
    ]) ?>    

</div>
